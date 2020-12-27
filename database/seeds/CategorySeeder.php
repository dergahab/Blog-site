<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories= ['genel','eylece','texnalogiya','seyahet','Tibb','Idman','idtisadiyyat'];
    	foreach ($categories as $category) {
    		'name'=>$category,
    		'slug'=>str_slug($category)

        Db::table('categories')->insert()

    };
    }
}
