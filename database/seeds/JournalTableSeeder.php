<?php

use Illuminate\Database\Seeder;

class JournalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Journal::class, 50)->create();
    }
}
