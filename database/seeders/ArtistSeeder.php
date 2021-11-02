<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::create([
            'name' => 'Avril Lavigne',
            'contact' => 'avrilla@lav.com',
            'tool' => 'Mic on stage',
        ]);

        Artist::create([
            'name' => 'Rihana',
            'contact' => 'hana@lav.com',
            'tool' => 'Clips',
        ]);


        Artist::create([
            'name' => 'Taylor swift',
            'contact' => 'taylor@swift.com',
            'tool' => 'Record',
        ]);


        Artist::create([
            'name' => 'Demi Lovato',
            'contact' => 'demi@lavoto.com',
            'tool' => 'Mic',
        ]);

        Artist::create([
            'name' => 'Adele',
            'contact' => 'adele@lav.com',
            'tool' => 'Stage',
        ]);


        Artist::create([
            'name' => 'Amr Diab',
            'contact' => 'amr@diab.com',
            'tool' => 'Mic',
        ]);

        Artist::create([
            'name' => 'Mohammed Mounier',
            'contact' => 'mounier@lav.com',
            'tool' => 'Clips',
        ]);


        Artist::create([
            'name' => 'MohammedHamaki',
            'contact' => 'hamaki@lav.com',
            'tool' => 'Mic',
        ]);

    }
}
