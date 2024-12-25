<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Waldemar',
            'email' => 'waldemar.grabowski@hostnet.pl',
            'password' => 'noYkeT#70',
        ]);
        
        //Product::factory(10)->create(); // Tworzy 10 losowych produktów
        Product::insert([
            [
                'name' => 'KURS: AI w pracy NAUCZYCIELA',
                'price' => 49.99,
                'description' => 'Kurs dotyczący wykorzystania sztucznej inteligencji w pracy nauczyciela',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KURS: Canva w pracy NAUCZYCIELA',
                'price' => 99.50,
                'description' => 'Kurs krok po kroku dotyczący Canvy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SUBSKRYPCJA: TIK w pracy NAUCZYCIELA',
                'price' => 199.00,
                'description' => 'Dostęp do nagrań historycznych webinarów',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);        
    }
}
