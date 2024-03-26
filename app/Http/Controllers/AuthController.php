<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->withSuccess('You have successfully logged in');
        }

        return redirect("login")->withSuccess('Oops! You have entered invalid credentials');
    }

    /**
     * Display the specified resource.
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = $request->all();
        $check = $this->create($data);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->withSuccess('You have successfully logged in');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function dashboard()
    {
        $tickets = Ticket::orderByDesc('created_at')->get();
        $ticketCount = Ticket::count();
        $clientCount = User::role('Client')->count();
        $picCount = User::role('PIC')->count();
        $ticketOpen = Ticket::where('status', 'open')->count();
        $ticketOngoing = Ticket::where('status', 'ongoing')->count();
        $ticketClosed = Ticket::where('status', 'close')->count();

        $i = 1;

        if (Auth::check()) {
            if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('PIC')) {
                return view('auth.dashboard', compact('tickets', 'i', 'ticketCount', 'clientCount', 'picCount', 'ticketOpen', 'ticketOngoing', 'ticketClosed'));
            }
            if (Auth::user()->hasRole('Client')) {
                return redirect()->route('index')->with('message', 'success login');
            }
        }

        return redirect("login")->withSuccess('Oops! You do not have access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function create($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'no_telp' => $data['no_telp']
        ]);
        $role = Role::findByName('Client');
        if ($role) {
            $user->assignRole('Client');
        } else {
            $role = Role::create(['name' => 'Client']);
            $permissions = Permission::pluck('list-ticket');
            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function profileView()
    {
        return view('auth.profiles');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
        ]);

        
        $input = $request->all();
        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input['password'] = Auth::user()->password;
        }
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('profile'), $fileName);
            $input['foto'] = $fileName;
        }   

        $user = User::find(Auth::user()->id);
        $user->update($input);

        return redirect()->route('auth.profiles')->with('message', 'Profile updated successfully');
    }

    public function viewPDF()
    {
        $pathToFile = public_path('\file\PANDUAN MENGGUNAKAN HELP DESK - TI.pdf'); // Ganti dengan path sesuai dengan lokasi file PDF Anda
        $filename = 'PANDUAN MENGGUNAKAN HELP DESK - TI.pdf'; // Ganti dengan nama file PDF Anda

        return response()->file($pathToFile, ['Content-Type' => 'application/pdf'], $filename);
    }
}
