<?php
// database/seeders/ProductsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');
        
        $products = [
            [
                'name' => 'Croquettes Premium Chien Adulte',
                'slug' => 'croquettes-premium-chien-adulte',
                'description' => 'Croquettes complètes pour chiens adultes, riches en protéines de qualité. Formulé pour une santé optimale.',
                'price' => 90,
                'compare_price' => 49.90,
                'category_id' => $categories['chiens']->id,
                'animal_type' => 'Chien',
                'brand' => 'Royal Canin',
                'weight' => '12kg',
                'stock' => 50,
                'sku' => 'RC-CHIEN-001',
                'rating' => 4.5,
                'review_count' => 128,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.xIJKGD7RhpwkMg474C474&o=5&pid=21.1&w=160&h=105',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?w=300&h=200&fit=crop',
                    'https://images.unsplash.com/photo-1591946614720-90a587da4a36?w=300&h=200&fit=crop'
                ]),
                'features' => json_encode([
                    'Protéines de haute qualité',
                    'Sans colorants artificiels',
                    'Enrichi en vitamines',
                    'Pour chiens adultes'
                ]),
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'name' => 'Pâtée pour Chat Stérilisé',
                'slug' => 'patee-pour-chat-sterilise',
                'description' => 'Alimentation humide pour chats stérilisés, faible en calories. Contrôle du poids assuré.',
                'price' => 40,
                'compare_price' => 21.90,
                'category_id' => $categories['chats']->id,
                'animal_type' => 'Chat',
                'brand' => 'Purina',
                'weight' => '12x85g',
                'stock' => 100,
                'sku' => 'PUR-CHAT-002',
                'rating' => 4.3,
                'review_count' => 89,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.fPaB0sEkQVGavw474C474&o=5&pid=21.1&w=160&h=105',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1514888286974-6d03bde4ba42?w=300&h=200&fit=crop'
                ]),
                'features' => json_encode([
                    'Faible en calories',
                    'Riche en protéines',
                    'Texture onctueuse',
                    'Sans conservateurs'
                ]),
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'name' => 'Granulés pour Lapin',
                'slug' => 'granules-pour-lapin',
                'description' => 'Granulés complets pour lapins, enrichis en vitamines et minéraux essentiels.',
                'price' => 50,
                'compare_price' => null,
                'category_id' => $categories['rongeurs']->id,
                'animal_type' => 'Lapin',
                'brand' => 'Versele-Laga',
                'weight' => '2kg',
                'stock' => 75,
                'sku' => 'VL-LAPIN-003',
                'rating' => 4.7,
                'review_count' => 45,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.iU1FI2NLoPSfzA474C474&o=5&pid=21.1&w=160&h=105',
                'features' => json_encode([
                    'Enrichi en vitamines',
                    'Fibres naturelles',
                    'Pour lapins adultes',
                    'Digestion facile'
                ]),
                'is_featured' => false,
                'is_active' => true
            ],
            [
                'name' => 'Graines pour Oiseaux Mélange',
                'slug' => 'graines-pour-oiseaux-melange',
                'description' => 'Mélange de graines variées pour oiseaux de volière. Équilibré et nutritif.',
                'price' => 48.90,
                'compare_price' => 10.90,
                'category_id' => $categories['oiseaux']->id,
                'animal_type' => 'Oiseau',
                'brand' => 'Vitakraft',
                'weight' => '1kg',
                'stock' => 120,
                'sku' => 'VK-OISEAU-004',
                'rating' => 4.2,
                'review_count' => 67,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.OP4RWullnd4UoA474C474&o=5&pid=21.1&w=160&h=105',
                'features' => json_encode([
                    'Mélange équilibré',
                    'Graines de qualité',
                    'Enrichi en calcium',
                    'Pour tous oiseaux'
                ]),
                'is_featured' => false,
                'is_active' => true
            ],
            [
                'name' => 'Friandises Dentaires Chien',
                'slug' => 'friandises-dentaires-chien',
                'description' => 'Friandises qui nettoient les dents et rafraîchissent l\'haleine. Santé bucco-dentaire.',
                'price' => 50.90,
                'compare_price' => null,
                'category_id' => $categories['chiens']->id,
                'animal_type' => 'Chien',
                'brand' => 'Pedigree',
                'weight' => '150g',
                'stock' => 200,
                'sku' => 'PED-CHIEN-005',
                'rating' => 4.8,
                'review_count' => 210,
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.4Cc-_XrF7B0lRmRU0VjkjgHaHa?pid=Api&P=0&h=180',
                'features' => json_encode([
                    'Nettoie les dents',
                    'Rafraîchit l\'haleine',
                    'Sans sucre ajouté',
                    'Texture croquante'
                ]),
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'name' => 'Litière Aglomérante Chat',
                'slug' => 'litiere-aglomerante-chat',
                'description' => 'Litière agglomérante parfum lavande, haute absorption. Contrôle des odeurs.',
                'price' => 22.90,
                'compare_price' => 25.90,
                'category_id' => $categories['accessoires']->id,
                'animal_type' => 'Chat',
                'brand' => 'Tidy Cats',
                'weight' => '10L',
                'stock' => 60,
                'sku' => 'TC-CHAT-006',
                'rating' => 4.4,
                'review_count' => 156,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.M9Bu%2f2rZllQCHQ474C474&o=5&pid=21.1&w=160&h=105',
                'features' => json_encode([
                    'Haute absorption',
                    'Parfum lavande',
                    'Aglomérant rapide',
                    'Sans poussière'
                ]),
                'is_featured' => false,
                'is_active' => true
            ],
            [
                'name' => 'Poisson Rouge Flocons',
                'slug' => 'poisson-rouge-flocons',
                'description' => 'Flocons complets pour poissons rouges, enrichis en carotène pour des couleurs vives.',
                'price' => 69.50,
                'compare_price' => 7.90,
                'category_id' => $categories['poissons']->id,
                'animal_type' => 'Poisson',
                'brand' => 'Tetra',
                'weight' => '250ml',
                'stock' => 150,
                'sku' => 'TET-POISSON-007',
                'rating' => 4.6,
                'review_count' => 92,
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.nLF8oko9xhI9ig474C474&o=5&pid=21.1&w=160&h=105',
                'features' => json_encode([
                    'Enrichi en carotène',
                    'Flocons complets',
                    'Facile à digérer',
                    'Couleurs vives'
                ]),
                'is_featured' => false,
                'is_active' => true
            ],
            [
                'name' => 'Foin de Prairie pour Rongeurs',
                'slug' => 'foin-de-prairie-pour-rongeurs',
                'description' => 'Foin de qualité premium pour lapins, cochons d\'Inde et rongeurs. Frais et nutritif.',
                'price' => 90.90,
                'compare_price' => null,
                'category_id' => $categories['rongeurs']->id,
                'animal_type' => 'Rongeur',
                'brand' => 'Bunny',
                'weight' => '1kg',
                'stock' => 80,
                'sku' => 'BUN-RONGEUR-008',
                'rating' => 4.9,
                'review_count' => 34,
                'image_url' => 'https://tse2.mm.bing.net/th/id/OIP._xNxBKTtLZO5v3Z7A7OXAQHaJo?pid=Api&P=0&h=180',
                'features' => json_encode([
                    '100% naturel',
                    'Riche en fibres',
                    'Frais et odorant',
                    'Digestion saine'
                ]),
                'is_featured' => true,
                'is_active' => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}