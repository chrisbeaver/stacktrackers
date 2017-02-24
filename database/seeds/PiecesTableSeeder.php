<?php

use Illuminate\Database\Seeder;
use App\Piece;

class PiecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Piece::create(['name' => "American Silver Eagle", 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 999]);
    }
}
