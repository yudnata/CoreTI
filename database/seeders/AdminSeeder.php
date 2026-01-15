<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@coretis.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@coretis.com',
                'password' => Hash::make('admin123'), // Password: admin123
                'user_type' => 'admin',
            ]);

            $this->command->info('✅ Admin account created successfully!');
            $this->command->info('📧 Email: admin@coretis.com');
            $this->command->info('🔑 Password: admin123');
        } else {
            $this->command->warn('⚠️  Admin account already exists!');
        }
    }
}
