<?php

use Illuminate\Database\Seeder;

class JournalTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\JournalTransaction::class, 50)->create();
    }
}
