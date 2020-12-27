<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Db::table('configs')->insert([
      'title'=>"Blog site",
      'created_at'=>now(),
      'updated_at'=>now()
    ]);

}
}
