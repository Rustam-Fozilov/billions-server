<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'book_name' => 'The Alchemist',
            'author_name' => 'Paulo Coelho',
            'book_description' => 'The Alchemist is a novel by Brazilian author Paulo Coelho that was first published in 1988. Originally written in Portuguese, it became a widely translated international bestseller.',
            'book_image' => 'https://images-na.ssl-images-amazon.com/images/I/51ZU%2BCvkTyL._SX331_BO1,204,203,200_.jpg',
            'book_price' => 150,
            'page_count' => 208,
            'category_id' => 1,
            'cover_type' => 'Paperback',
            'book_language' => 'English',
            'book_year' => '1988',

        ]);

        Book::create([
            'book_name' => 'The Kite Runner',
            'author_name' => 'Khaled Hosseini',
            'book_description' => '',
            'book_image' => 'https://images-na.ssl-images-amazon.com/images/I/51ZU%2BCvkTyL._SX331_BO1,204,203,200_.jpg',
            'book_price' => 100,
            'page_count' => 328,
            'category_id' => 2,
            'cover_type' => 'Paperback',
            'book_language' => 'English',
            'book_year' => '1998',
        ]);

        Book::create([
            'book_name' => 'The Great Gatsby',
            'author_name' => 'F. Scott Fitzgerald',
            'book_description' => 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.',
            'book_image' => 'https://images-na.ssl-images-amazon.com/images/I/51ZU%2BCvkTyL._SX331_BO1,204,203,200_.jpg',
            'book_price' => 200,
            'page_count' => 200,
            'category_id' => 3,
            'cover_type' => 'Paperback',
            'book_language' => 'English',
            'book_year' => '1998',
        ]);

        Book::create([
            'book_name' => 'The Lord of the Rings',
            'author_name' => 'J. R. R. Tolkien',
            'book_description' => 'The Lord of the Rings is an epic high fantasy novel by the English author and scholar J. R. R. Tolkien. Set in Middle-earth, the world at some distant time in the past, the story began as a sequel to Tolkien\'s 1937 children\'s book The Hobbit, but eventually developed into a much larger work.',
            'book_image' => 'https://images-na.ssl-images-amazon.com/images/I/51ZU%2BCvkTyL._SX331_BO1,204,203,200_.jpg',
            'book_price' => 250,
            'page_count' => 1000,
            'category_id' => 4,
            'cover_type' => 'Paperback',
            'book_language' => 'English',
            'book_year' => '1998',
        ]);

        Book::create([
            'book_name' => 'The Da Vinci Code',
            'author_name' => 'Dan Brown',
            'book_description' => 'This book is a work of fiction. Names, characters, places and incidents are products of the author\'s imagination or are used fictitiously. Any resemblance to actual events or locales or persons, living or dead, is entirely coincidental.',
            'book_image' => 'https://images-na.ssl-images-amazon.com/images/I/51ZU%2BCvkTyL._SX331_BO1,204,203,200_.jpg',
            'book_price' => 300,
            'page_count' => 500,
            'category_id' => 5,
            'cover_type' => 'Paperback',
            'book_language' => 'English',
            'book_year' => '1998',
        ]);
    }
}
