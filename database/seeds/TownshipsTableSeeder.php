<?php

use App\Models\Township;
use Illuminate\Database\Seeder;

class TownshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('townships')->truncate();

        factory(Township::class, 60)->create();
    }
}
