<?php

namespace App\Support\Import;

use App\Models\Film;
use Illuminate\Support\Facades\Http;

class OmdbRepository implements FilmRepository
{
    /**
     * Gets information about the movie for moderation.
     *
     * @param string $imdbId
     * @return array|null
     */
    public function getFilm(string $imdbId): ?array
    {
        $data = $this->api($imdbId);

        if ($data->clientError()) {
            return null;
        }

        $film = Film::firstOrNew(['imdb_id' => $imdbId]);
        $film->fill([
            'name' => $film['name'] ?? $data['title'],
            'description' => $data['plot'],
            'imdb_id' => $data['imdbID'],
            'status' => Film::FILM_MODERATE,
        ]);

        return [
            'film' => $film,
        ];

    }

    /**
     * Getting a response from the service OMDb API.
     *
     * @param string $imdbId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    private function api(string $imdbId)
    {
        return Http::get(config('services.omdbapi.url'),
            [
                'apikey' => config('services.omdbapi.apikey'),
                'i' => $imdbId,
            ]
        );
    }
}
