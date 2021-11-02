<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Show;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Show::create([
            'title' => 'Music Kingdom',
            'description' => 'This is a kingdom',
            'venue_id' => '1',
            'artist_id' => '1',
        ]);

        Show::create([
            'title' => 'Music dreamland',
            'description' => 'Here you can live tour dreams',
            'venue_id' => '1',
            'artist_id' => '2',
        ]);


        Show::create([
            'title' => 'Music Rewind',
            'description' => 'This is a taste of music',
            'venue_id' => '2',
            'artist_id' => '1',
        ]);

        Show::create([
            'title' => 'Musify',
            'description' => 'This is a diffrent type of music',
            'venue_id' => '3',
            'artist_id' => '3',
        ]);

        Show::create([
            'title' => 'Musvio',
            'description' => 'This is a taste of music',
            'venue_id' => '3',
            'artist_id' => '3',
        ]);


        Show::create([
            'title' => 'Music Public',
            'description' => 'This is a public show',
            'venue_id' => '3',
            'artist_id' => '4',
        ]);

        Show::create([
            'title' => 'Music time',
            'description' => 'This is a public show',
            'venue_id' => '6',
            'artist_id' => '6',
        ]);

        Show::create([
            'title' => 'Music party',
            'description' => 'This is a public show',
            'venue_id' => '1',
            'artist_id' => '5',
        ]);

        Show::create([
            'title' => 'Music halween',
            'description' => 'This is a public show',
            'venue_id' => '1',
            'artist_id' => '4',
        ]);

        Show::create([
            'title' => 'Music concert',
            'description' => 'This is a public show',
            'venue_id' => '5',
            'artist_id' => '1',
        ]);

        Show::create([
            'title' => 'Music day',
            'description' => 'This is a public show',
            'venue_id' => '5',
            'artist_id' => '5',
        ]);
    }
}
