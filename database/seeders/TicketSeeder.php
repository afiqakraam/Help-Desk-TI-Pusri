<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $userIds = User::pluck('id')->toArray();

        // Mengisi kolom dengan data dummy
        for ($i = 0; $i < 100; $i++) {
            DB::table('tickets')->insert([
                'user_id' => $faker->randomElement($userIds), // Select random user ID from existing users
                'subject' => $faker->sentence,
                'name' => $faker->name,
                'email' => $faker->email,
                'priority' => $faker->randomElement(['0', '1', '2', '3']),
                'type' => $faker->randomElement(['keluhan', 'permintaan']),
                'destination' => $faker->randomElement(['layanan it', 'pengembangan', 'infrastruktur']),
                'no_telp' => $faker->phoneNumber,
                'ticket_number' => $faker->randomNumber(6),
                'file' => $faker->word,
                'reply_message' => $faker->sentence,
                'message' => $faker->paragraph,
                'created_by' => $faker->name,
                'deleted_by' => null,
                'status' => $faker->randomElement(['open', 'closed']),
                'created_at' => Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 24))->subMinutes(rand(0, 60))->toDateTimeString(),
            ]);
        }
    }
}
