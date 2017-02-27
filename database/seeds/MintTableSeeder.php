<?php

use Illuminate\Database\Seeder;
use App\Mint;

class MintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mint::create(['name' => 'United States Mint']);
        Mint::create(['name' => 'Royal Canadian Mint']);
        Mint::create(['name' => 'The Royal Mint']);
        Mint::create(['name' => 'Mexican Mint']);
        Mint::create(['name' => 'Perth Mint']);
        Mint::create(['name' => 'Austrian Mint']);
        Mint::create(['name' => 'Mint of Poland']);
        Mint::create(['name' => 'PAMP Suisse']);
        Mint::create(['name' => 'Scottsdale Mint']);
        Mint::create(['name' => 'Valcambi']);
        Mint::create(['name' => 'Das Bayerisches Hauptmünzamt Mint']);
        Mint::create(['name' => 'Central Bank of Armenia']);
        Mint::create(['name' => 'Royal Australian Mint']);
        Mint::create(['name' => 'Austrian Mint']);
        Mint::create(['name' => 'China Mint']);
        // Mint::create(['name' => '']);
        // Mint::create(['name' => '']);
    }
}
