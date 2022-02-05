<?php

use Illuminate\Database\Seeder;

class AddDivision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brasileirao')->insert([
            'division_name' => 'Série A 2021',
        ]);
    }
}
