<?php

namespace Database\Seeders;

use App\Models\Contribution;
use App\Models\Mission;
use App\Models\MissionLine;
use App\Models\Organisation;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $organisation = Organisation::factory()
            ->has(
                Mission::factory()
                    ->count(5)
                    ->has(
                        MissionLine::factory()
                            ->count(rand(1, 5)),
                        'lines'
                    )
                    ->has(
                        Transaction::factory()
                        ->count(3)
                    )
            )
            ->has(
                Contribution::factory()
            )
            ->create();

//        Transaction::factory()
//            ->create();
//
//        Contribution::factory()
//            ->create();
    }
}
