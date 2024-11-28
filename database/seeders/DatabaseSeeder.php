<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al seeder para crear los roles 
        $this->call(RoleSeeder::class);

        // Llamar al seeder para el usuario admin
        $this->call(AdminUserSeeder::class);

        // Llamar al seeder para crear las preguntas
        $this->call(PreguntasSeeder::class);
    }
}
