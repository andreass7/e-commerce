<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = ['kecantikan', 'baju pria', 'baju wanita', 'elektronik'];

        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {

                Product::create([
                    'name' => $this->generateProductName($category, $faker),
                    'description' => $faker->sentence,
                    'price' => $faker->randomFloat(2, 10, 200),
                    'stock' => $faker->numberBetween(1, 100),
                    'category' => $category,
                ]);
            }
        }
    }

    private function generateProductName($category, $faker)
    {
        switch ($category) {
            case 'kecantikan':
                return $faker->randomElement(['Lipstick', 'Foundation', 'Mascara', 'Perfume']);
            case 'baju pria':
                return $faker->randomElement(['T-shirt', 'Jeans', 'Suit', 'Jacket']);
            case 'baju wanita':
                return $faker->randomElement(['Dress', 'Skirt', 'Blouse', 'Pants']);
            case 'elektronik':
                return $faker->randomElement(['Smartphone', 'Laptop', 'Camera', 'Headphones']);
            default:
                return $faker->word;
        }
    }
}
