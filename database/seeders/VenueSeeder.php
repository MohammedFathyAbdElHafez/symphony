<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Venue::create([
            'title' => 'Symphony Hall',
            'description' => 'Symphony Hall opened in 1991, and with a capacity of over 2,200 its one of the biggest concert halls in the country.',
        ]);

        Venue::create([
            'title' => 'Grand Opera House York',
            'description' => 'the Grand Opera House was also the home of Yorks first public performances of films.',
        ]);

        Venue::create([
            'title' => 'The Bungalow',
            'description' => 'The Bungalow is an independent and ethical live music venue nestled within the heart of Paisley Town Centre (Central Scotland).',
        ]);

        Venue::create([
            'title' => 'Glasgow Royal Concert Hall',
            'description' => 'Located at the meeting point of two of Glasgows busiest streets Glasgow Royal Concert Hall is an arts venue and concert hall run by Glasgow Life',
        ]);

        Venue::create([
            'title' => 'O2 Academy Glasgow',
            'description' => 'The Art Deco majesty of the O2 Academy Glasgow building is a legacy of its former life as the New Bedford Cinema, built in 1932 after the original Bedford Cinema burned down.',
        ]);

        Venue::create([
            'title' => 'The Tivoli Theatre',
            'description' => 'Built in 1936 as a cinema and theatre, by the late 70s the Tivoli was under threat of demolition but following a long campaign to save the building it reopened in 1993',
        ]);

        Venue::create([
            'title' => 'The Atkinson',
            'description' => 'Founded by William Atkinson in the late 1800s. the Atkinson has been open in its current format, since May 2013. The venue comprises a theatre, studio, cafe, shop, exhibition spaces, library and a museum.',
        ]);

        Venue::create([
            'title' => 'Pavilion Theatre',
            'description' => 'Built in 1926, the Pavilion Theatre sits on the end of Worthing Pier with the sea providing a picturesque background. ',
        ]);

        Venue::create([
            'title' => 'Barbican Centre',
            'description' => 'the largest multi-arts and conference venue, the historic Barbican Centre leaves no creative stone unturned with a programme of art, music, theatre, dance, film and creative learning events.',
        ]);


        foreach(Venue::all() as $venue) {
            $artists = \App\Models\Artist::inRandomOrder()->take(rand(1,3))->pluck('id');
            $venue->artists()->attach($artists);
        }
                
    }
}
