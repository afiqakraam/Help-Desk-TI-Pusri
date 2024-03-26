<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('subject');
            $table->string('name');
            $table->string('email');
            $table->string('priority');
            $table->string('type');
            $table->string('destination');
            $table->string('no_telp')->nullable();
            $table->string('ticket_number')->nullable();
            $table->string('file');
            $table->string('reply_message');
            $table->text('message')->nullable();
            $table->string('created_by');
            $table->string('deleted_by')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
