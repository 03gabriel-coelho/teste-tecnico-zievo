<?php

namespace Database\Seeders;

use App\Models\BooksModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!BooksModel::where('title', 'O Senhor dos Anéis')->exists()) {
            BooksModel::create([
                'title' => 'O Senhor dos Anéis',
                'author' => 'J. R. R. Tolkien',
                'published_year' => 1954,
                'genre' => 'Fantasia',
                'synopsis' => 'O Senhor dos Anéis é um romance de fantasia criado pelo escritor, professor e filólogo britânico J.R.R. Tolkien. A história começa como sequência de um livro anterior de Tolkien, O Hobbit, e logo se desenvolve numa história muito maior. Foi escrito por Tolkien ao longo de muitos anos, durante a década de 1940 até os anos 1970, e foi publicado postumamente pela sua família em 1976.',
                'pages' => 1200,
            ]);
        }

        if(!BooksModel::where('title', 'Harry Potter e a Pedra Filosofal')->exists()) {
            BooksModel::create([
                'title' => 'Harry Potter e a Pedra Filosofal',
                'author' => 'J. K. Rowling',
                'published_year' => 1997,
                'genre' => 'Fantasia',
                'synopsis' => 'Harry Potter e a Pedra Filosofal é o primeiro livro dos sete volumes da série de fantasia Harry Potter, tanto em termos cronológicos como em ordem de publicação, da autora inglesa J. K. Rowling. Foi primeiramente publicado no Reino Unido pela editora londrina Bloomsbury em 26 de junho de 1997, e posteriormente nos Estados Unidos em 1 de setembro do mesmo ano pela editora Scholastic Corporation sob o título Harry Potter and the Sorcerer\'s Stone.',
                'pages' => 223,
            ]);
        }

        if(!BooksModel::where('title', 'O Pequeno Príncipe')->exists()) {
            BooksModel::create([
                'title' => 'O Pequeno Príncipe',
                'author' => 'Antoine de Saint-Exupéry',
                'published_year' => 1943,
                'genre' => 'Infantil',
                'synopsis' => 'O Pequeno Príncipe é uma obra do escritor, ilustrador e piloto francês Antoine de Saint-Exupéry. O livro foi publicado pela primeira vez em 1943 nos Estados Unidos, onde Saint-Exupéry se exilara após a queda da França na Segunda Guerra Mundial. O autor, que também ilustrou a obra, fez diversos esboços de suas aquarelas e desenhos, que foram usados na primeira edição do livro.',
                'pages' => 96,
            ]);
        }
    }
}
