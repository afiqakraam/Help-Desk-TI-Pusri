<?php

namespace App\Http\Controllers;

use App\Mail\SendGmail;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required',
            'priority' => 'required',
            'jenisid' => 'required',
            'destination' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $min = 1000;
        $max = 10000;

        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->subject = $request->subject;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = $request->priority;
        $ticket->type = $request->jenisid;
        $ticket->destination = $request->destination;
        $ticket->created_by = 1;
        $ticket->status = "open";
        $ticket->ticket_number = rand($min, $max);
        $ticket->message = $request->message;

        // Jika ada file gambar yang diunggah, simpan di folder public
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $ticket->file = $imageName; // menyimpan path gambar ke database
        }

        $ticket->reply_message = "Belum ada pesan balasan";

        $ticket->save();

        return redirect()->route('index')->with('success', 'Ticket created successfully');
    }

    public function process($id, $type)
    {
        $ticket = Ticket::findOrFail($id);

        if ($type == "ongoing") {
            $ticket->status = "ongoing";
        } else {
            $ticket->status = "review";
        }
        $ticket->update();

        return redirect()->back()->with("message", "tickets is approved !");
    }


    public function dashboardClient()
    {
        if (Auth::check()) {
            $data = Ticket::where('user_id', '=', Auth::user()->id)->get();
            $i = 1;
            return view('layouts.landing.dashboard', compact('data', 'i'));
        }
        return redirect()->back()->with('message', "You don't have a login account !");
    }

    public function replyTicket($id)
    {
        $ticket = Ticket::where('id', '=', $id)->first();
        return view('layouts.tickets.replyTicket', compact('ticket'));
    }



    public function replyticket_post(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->reply_message = $request->reply_message;
        $ticket->status = 'REVIEW';
        $ticket->save();
        $title = 'Help Desk | Tiket Anda telah dibalas';
        $subject = "Keluhan";
        $body = 'keluhan anda sudah di response terimakasih telah berkunjung';
        Mail::to($ticket->email)->send(new SendGmail($subject, $title, $body));
        Log::alert("send gmail success");
        return redirect()->back()->with('success', 'Ticket status has been updated to REVIEW.');
    }

    public function filterbymonth(Request $request)
    {
        $filteredData = Ticket::whereMonth('created_at', '=', $request->month)->get();

        return response()->json(
            $filteredData
        );
    }
    public function closeTicketStatus($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = "close";
        $ticket->update();

        return redirect()->back()->with('message', 'Ticket is closed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket_id = $ticket->id; // Define $ticket_id

        return view('layouts.tickets.detailTicket', compact('ticket', 'ticket_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'reply_message' => 'required',
            // validate other fields...
        ]);

        $ticket->update([
            'reply_message' => $request->input('reply_message'),
            // other fields...
        ]);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    public function getUserTicket($id)
    {
        $dataUserTicket = User::where('id', '=', $id)->with('tickets')->get();
        return view('layouts.tickets.userTicket', compact('dataUserTicket'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->back()->with('message', 'delete berhasil');
    }
}
