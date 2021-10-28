<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Transaksi::create([
            'sewa_id'  => 1,
            'nominal' => 500000,
            'bukti_pembayaran' => 'produk_default.jpg',
            'bulan' => 'September',
            'tahun' => '2021',
            'status' => 'SB',
            'note' => '<p><b>Terima kasih sudah melunasi bayaran bulan September</b><br></p>',
        ]);
        \App\Models\Transaksi::create([
            'sewa_id'  => 1,
            'nominal' => 500000,
            'bukti_pembayaran' => 'produk_default.jpg',
            'bulan' => 'Oktober',
            'tahun' => '2021',
            'status' => 'SB',
            'note' => '<p><b>Terima kasih sudah melunasi bayaran bulan Oktober</b><br></p>',
        ]);
        \App\Models\Transaksi::create([
            'sewa_id'  => 1,
            'nominal' => 500000,
            'bukti_pembayaran' => 'produk_default.jpg',
            'bulan' => 'November',
            'tahun' => '2021',
            'status' => 'SB',
            'note' => '<p><b>Terima kasih sudah melunasi bayaran bulan November</b><br></p>',
        ]);
        \App\Models\Transaksi::create([
            'sewa_id'  => 1,
            'nominal' => 500000,
            'bukti_pembayaran' => 'produk_default.jpg',
            'bulan' => 'Desember',
            'tahun' => '2021',
            'status' => 'BB',
            'note' => '<p><b>Jangan lupa bayar kontrakan bulan ini!!</b><br></p>',
        ]);
    }
}
