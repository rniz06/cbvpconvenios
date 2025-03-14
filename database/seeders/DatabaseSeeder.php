<?php

namespace Database\Seeders;

use App\Models\Institucion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'personal_id' => 8526,
            'email' => 'mmeza@cbvp.org.py',
            'password' => Hash::make('Rann2006')
        ]);

        $this->call([
            ConvenioEstadoSeeder::class,
            InstitucionSeeder::class,
            //CommentSeeder::class,
        ]);
    }
}
