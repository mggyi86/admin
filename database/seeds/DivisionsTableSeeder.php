<?php

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    protected $names = ['Yangon', 'Mandalay', 'Bago', 'Ayeyarwady', 'Shan State', 'Sagain', 'Naypyidaw', 'Mon State',
        'Magway', 'Kayin State', 'Kayah State', 'Kachin State', 'Chin State', 'Tanintharyi', 'Rakhine State'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('divisions')->truncate();
        DB::statement('TRUNCATE TABLE divisions CASCADE;');
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach($this->names as $name) {
            factory(Division::class)->create([
                'name' => $name,
                'slug' => str_slug($name)
            ]);
        }
    }
}
