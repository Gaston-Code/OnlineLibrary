<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Livre 1',
                'author' => 'Auteur 1',
                'description' => 'Description du livre 1...',
                'cover_image' => 'cover1.jpg',
            ],
            [
                'title' => 'Livre 2',
                'author' => 'Auteur 2',
                'description' => 'Description du livre 2...',
                'cover_image' => 'cover2.jpg',
            ],
            [
                'title' => 'Livre 3',
                'author' => 'Auteur 3',
                'description' => 'Description du livre 3...',
                'cover_image' => 'cover3.jpg',
            ],
            [
                'title' => 'Livre 4',
                'author' => 'Auteur 4',
                'description' => 'Description du livre 4...',
                'cover_image' => 'cover4.jpg',
            ],
            
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
}
