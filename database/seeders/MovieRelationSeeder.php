<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Pivots\ActorMovie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class MovieRelationSeeder extends Seeder
{
    private Collection $movies;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->movies = Movie::whereIn('title', ['Napoleon', 'Monsieur N.', 'Waterloo'])->get()->keyBy('title');
        $this->seedDirectorMovieRelations();
        $this->seedActorMovieRelations();
    }

    private function seedActorMovieRelations(): void
    {

        $actors = Actor::all()->keyBy('name');

        $actorsInMovie = [
            [
                'movie_id' => $this->movies['Napoleon']->getKey(),
                'actor_id' => $actors['Joaquin']->getKey(),
                'roles' => json_encode(['Napoleon Bonaparte']),
            ],
            [
                'movie_id' => $this->movies['Napoleon']->getKey(),
                'actor_id' => $actors['Vanessa']->getKey(),
                'roles' => json_encode(['Josephine Bonaparte']),
            ],
            [
                'movie_id' => $this->movies['Napoleon']->getKey(),
                'actor_id' => $actors['Tahar']->getKey(),
                'roles' => json_encode(['Paul Barras']),
            ],
            [
                'movie_id' => $this->movies['Monsieur N.']->getKey(),
                'actor_id' => $actors['Philippe']->getKey(),
                'roles' => json_encode(['Napoléon Bonaparte']),
            ],
            [
                'movie_id' => $this->movies['Monsieur N.']->getKey(),
                'actor_id' => $actors['Richard']->getKey(),
                'roles' => json_encode(['Sir Hudson Lowe']),
            ],
            [
                'movie_id' => $this->movies['Monsieur N.']->getKey(),
                'actor_id' => $actors['Jay']->getKey(),
                'roles' => json_encode(['Basil Heathcote']),
            ],
            [
                'movie_id' => $this->movies['Waterloo']->getKey(),
                'actor_id' => $actors['Rod']->getKey(),
                'roles' => json_encode(['Napoléon Bonaparte']),
            ],
            [
                'movie_id' => $this->movies['Waterloo']->getKey(),
                'actor_id' => $actors['Orson']->getKey(),
                'roles' => json_encode(['Louis XVIII']),
            ],
            [
                'movie_id' => $this->movies['Waterloo']->getKey(),
                'actor_id' => $actors['Christopher']->getKey(),
                'roles' => json_encode(['Arthur Wellesley']),
            ],
        ];

        ActorMovie::insert($actorsInMovie);
    }

    private function seedDirectorMovieRelations(): void
    {
        $directors = Director::all()->keyBy('name');

        $this->movies['Napoleon']->update(['director_id' => $directors['Ridley']->getKey()]);
        $this->movies['Monsieur N.']->update(['director_id' => $directors['Antoine']->getKey()]);
        $this->movies['Waterloo']->update(['director_id' => $directors['Sergey']->getKey()]);
    }
}
