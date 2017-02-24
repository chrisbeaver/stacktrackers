<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['tag' => 'ASE','name' => 'American Silver Eagle', 'description' => 'American Silver Eagle 1oz. Round']);
    }
}
