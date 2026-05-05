<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event
        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $category3 = \App\Models\Category::firstOrCreate([
            'name' => 'Workshop',
            'slug' => 'workshop',
        ]);

        // 3. Insert Sampel Events - Minimal 6 events dengan variatif
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang menenangkan.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terkini dalam bidang Artificial Intelligence dan Machine Learning.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000,
            'stock' => 150,
            'poster_path' => 'posters/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'UI/UX Masterclass 2026',
            'description' => 'Pelajari prinsip desain antarmuka modern dan user experience yang optimal.',
            'date' => '2026-05-15 10:00:00',
            'location' => 'Laboratorium Desain',
            'price' => 60000,
            'stock' => 80,
            'poster_path' => 'posters/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Web Development Advanced',
            'description' => 'Kuasai teknik-teknik advanced dalam pengembangan web modern dengan Laravel dan Vue.js.',
            'date' => '2026-06-01 14:00:00',
            'location' => 'Ruang Lab Komputer',
            'price' => 75000,
            'stock' => 60,
            'poster_path' => 'posters/event-4.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'E-Sport U-Champ Championship',
            'description' => 'Kompetisi esports terbesar dengan hadiah jutaan rupiah untuk berbagai game terpopuler.',
            'date' => '2026-05-20 17:00:00',
            'location' => 'Gedung Olahraga Amikom',
            'price' => 100000,
            'stock' => 200,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Data Science & Analytics Workshop',
            'description' => 'Dapatkan skill praktis dalam analisis data dan membuat keputusan berbasis data.',
            'date' => '2026-06-10 09:00:00',
            'location' => 'Ruang Meeting Hall',
            'price' => 65000,
            'stock' => 50,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}
