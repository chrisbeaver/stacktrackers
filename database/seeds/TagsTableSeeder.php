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
        Tag::create(['tag' => 'Maple Leaf','name' => 'Canadian Maple Leaf', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Panda','name' => 'Chinese Panda', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Beast','name' => 'Queen\'s Beast', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Libertad','name' => 'Mexican Libertad', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Koala','name' => 'Mexican Libertad', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Kookaburra','name' => 'Mexican Libertad', 'description' => 'Canadian Maple Leaf 1oz. Round']);
        Tag::create(['tag' => 'Kangaroo','name' => 'Mexican Libertad', 'description' => 'Canadian Maple Leaf 1oz. Round']);
    }
}
