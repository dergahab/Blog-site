<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker =Faker::create();

        for($i=0;$i<100;$i++){
            DB::table('aticles')->insert([
                'categori_id'=>rand(1,6),
                'title'=>$faker->jobTitle,
                'content'=>$faker->text,
                'slug'=>Str::slug($faker->title,'-'),
                'created_at'=>now(),

            ]);
    }
}
}
