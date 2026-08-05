<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Admin PPI',
            'email' => 'ppikastamonu@gmail.com',
            'password' => bcrypt('ppikastam_2016'),
        ]);



       DB::table('positions')->updateOrInsert(['name' => 'Ketua Umum'], ['level' => 1]);
       DB::table('positions')->updateOrInsert(['name' => 'MPA'], ['level' => 1]);
       DB::table('positions')->updateOrInsert(['name' => 'Wakil Ketua'], ['level' => 2]);
       DB::table('positions')->updateOrInsert(['name' => 'Sekretaris Jenderal'], ['level' => 3]);
       DB::table('positions')->updateOrInsert(['name' => 'Sekretaris'], ['level' => 3]);
       DB::table('positions')->updateOrInsert(['name' => 'Bendahara'], ['level' => 4]);
       DB::table('positions')->updateOrInsert(['name' => 'Kepala Divisi'], ['level' => 1]);
       DB::table('positions')->updateOrInsert(['name' => 'Anggota'], ['level' => 2]);

    }
}
