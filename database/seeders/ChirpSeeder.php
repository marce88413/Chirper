<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        $users = collect([
            User::firstOrCreate(
                ['email' => 'alice@example.com'],
                [
                    'name' => 'Alice Developer',
                    'password' => bcrypt('password'),
                ]
            ),
            User::firstOrCreate(
                ['email' => 'bob@example.com'],
                [
                    'name' => 'Bob Builder',
                    'password' => bcrypt('password'),
                ]
            ),
            User::firstOrCreate(
                ['email' => 'charlie@example.com'],
                [
                    'name' => 'Charlie Coder',
                    'password' => bcrypt('password'),
                ]
            ),
        ]);

        $messages = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Learning to build applications with Laravel!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
        ];

        foreach ($messages as $message) {
            $user = $users->random();

            $chirp = $user->chirps()->firstOrCreate([
                'message' => $message,
            ]);

            if ($chirp->wasRecentlyCreated) {
                $chirp->created_at = now()->subMinutes(rand(5, 1440));
                $chirp->save();
            }
        }
    }
}