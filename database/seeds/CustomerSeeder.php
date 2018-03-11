<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();
        for ($i=0; $i < 10; $i++) {
            \App\Customer::create([
                'name'   => 'name '.$i,
                'password'   => md5('123456'),
                'mail'    => 'mail '.$i,
            ]);
        }
    }
}
