<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PostKontrakan;
use Illuminate\Support\Str;

class PostKontrakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        
        PostKontrakan::truncate();

        $admin->posts()->saveMany([
            new PostKontrakan([
                'title'   => 'Kamar Nomer 1',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 2',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'isi',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 3',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 4',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 5',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 6',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M     <li>Kamar Tidur 2</li><li>Kamar Mandi 1     ',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 7',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M     <li>Kamar Tidur 2</li><li>Kamar Mandi 1     ',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 8',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 9',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 10',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 11',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 12',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 13',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 14',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 15',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 16',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 17',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 18',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 19',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 20',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 21',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 22',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
            new PostKontrakan([
                'title'   => 'Kamar Nomer 23',
                'thumbnail' => 'produk_default.jpeg',
                'content' => '<ul><li>Luas rumah 3x7M</li><li>Kamar Tidur 2</li><li>Kamar Mandi 1</li></ul>',
                'address' => 'Jl.Cempaka Putih Raya, Cempaka Putih Barat, Jakarta Timur',
                'price' => '500000',
                'status' => 'kosong',
            ]),
        ]);
    }
}
