<?php

namespace App\Models\DTO;

use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieDTO extends ReviewableDTO
{
    public function __construct(
        public ?int         $id,
        public ?string      $title,
        public ?int         $releaseYear,
        public ?string      $description,
        public ?string      $trailerUrl,
        public ?DirectorDTO $director,
        public Collection   $actors,
        public string       $type = self::MOVIE
    )
    {
    }

    public static function make(Movie $movie): self
    {
        $movie->load(['director', 'actors']);

        return new self(
            id: $movie->id,
            title: $movie->title,
            releaseYear: $movie->release_year,
            description: $movie->description,
            trailerUrl: 'https://www.youtube.com/embed/' . $movie->trailer_id,
            director: $movie->director ? DirectorDTO::make($movie->director) : null,
            actors: collect($movie->actors)->map(fn($actor) => ActorDTO::make($actor)),
        );
    }
}
