<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Users
        DB::table('users')->insert([
            [
                'name' => 'Admin Example',
                'gender' => 'L',
                'birth_date' => '1990-01-01',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'User One',
                'gender' => 'P',
                'birth_date' => '1995-05-10',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Courses
        DB::table('courses')->insert([
            [
                'course_name' => 'Pemrograman PHP',
                'mentor_name' => 'Budi Santoso',
                'mentor_degree' => 'S.Kom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_name' => 'Dasar Laravel',
                'mentor_name' => 'Siti Aminah',
                'mentor_degree' => 'S.T.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Assign user to course (user_courses)
        // Ambil id user dan course langsung (misal user1 = id 2, course 1)
        DB::table('user_courses')->insert([
            'user_id' => 2,
            'course_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
