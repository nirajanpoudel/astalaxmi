<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ClientTableSeeder::class);
        // $this->call(JournalTableSeeder::class);
        $this->call(JournalTransactionTableSeeder::class);

    }
}
