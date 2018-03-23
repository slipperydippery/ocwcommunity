<?php

use App\Tagcategory;
use Illuminate\Database\Seeder;

class TagcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_cat_phase = new Tagcategory();
        $tag_cat_phase->name = 'fase';
        $tag_cat_phase->description = 'Een tag die aangeeft voor welke fase in de samenwerking de informatie bedoeld is.';
        $tag_cat_phase->save();

        $tag_cat_department = new Tagcategory();
        $tag_cat_department->name = 'afdeling';
        $tag_cat_department->description = 'Een tag die aangeeft voor welke afdeling de informatie bedoeld is.';
        $tag_cat_department->save();

        $tag_cat_samenwerkingsvorm = new Tagcategory();
        $tag_cat_samenwerkingsvorm->name = 'samenwerkingsvorm';
        $tag_cat_samenwerkingsvorm->description = 'Een tag die aangeeft voor welke samenwerkingsvorm de informatie bedoeld is.';
        $tag_cat_samenwerkingsvorm->save();
    }
}
