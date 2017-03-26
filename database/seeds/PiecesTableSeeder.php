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
        Piece::create(['name' => "American Silver Eagle", 'mint_id' => 1, 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 999]);
        Piece::create(['name' => "US Silver Dollar", 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 999]);
        Piece::create(['name' => "Canadian Maple Leaf", 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 9999]);
        Piece::create(['name' => "Chinese Panda", 'mint_id' => 15, 'weight' => 33, 'weight_unit' => "grams", 'finess' => 999]);
        Piece::create(['name' => "Mexican Libertad", 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 999]);
        Piece::create(['name' => "Kennedy Half Dollar", 'weight' => 1.0, 'weight_unit' => "ounces", 'finess' => 90]);

    }
}
