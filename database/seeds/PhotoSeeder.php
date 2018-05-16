<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'body'=>'first photo',
            'showhide'=>'show',
            ]);
    }
}
