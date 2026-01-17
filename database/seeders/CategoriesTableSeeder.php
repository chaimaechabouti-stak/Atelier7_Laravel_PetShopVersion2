<?php
// database/seeders/CategoriesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Chiens',
                'slug' => 'chiens',
                'icon' => 'fas fa-dog',
                'color' => '#E74C3C',
                'description' => 'Aliments et accessoires pour chiens',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Chats',
                'slug' => 'chats',
                'icon' => 'fas fa-cat',
                'color' => '#3498DB',
                'description' => 'Aliments et accessoires pour chats',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Rongeurs',
                'slug' => 'rongeurs',
                'icon' => 'fas fa-paw',
                'color' => '#9B59B6',
                'description' => 'Aliments pour lapins, hamsters, cochons d\'Inde',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Oiseaux',
                'slug' => 'oiseaux',
                'icon' => 'fas fa-dove',
                'color' => '#F1C40F',
                'description' => 'Graines et aliments pour oiseaux',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Poissons',
                'slug' => 'poissons',
                'icon' => 'fas fa-fish',
                'color' => '#1ABC9C',
                'description' => 'Nourriture pour poissons d\'aquarium',
                'order' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Accessoires',
                'slug' => 'accessoires',
                'icon' => 'fas fa-bone',
                'color' => '#95A5A6',
                'description' => 'Accessoires pour tous les animaux',
                'order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}