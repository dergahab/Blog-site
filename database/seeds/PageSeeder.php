<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages= ['Haqqimizda','vizyonumuz','misyonumuz'];
        $count =0;
    	foreach ($pages as $page) {
    		$count++;
    		Db::table('pages')->insert([
    		'title'=>$page,
    		'image'=>'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bigstockphoto.com%2F&psig=AOvVaw3WQE-NdrwWiv2rdsiSMR2A&ust=1587574035707000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCKjlo6j8-egCFQAAAAAdAAAAABAD',
    		'slug'=>$page,
    		'order'=>$count,
    		'created_at'=>now(),
    		'updated_at'=>now()
    	]);
    }
}
}
