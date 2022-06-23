<?php

namespace Wtw\backend\services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Wtw\backend\services\MoviesRepository;
use Wtw\backend\services\HttpClient;

/**
 * Repository for getting information about a movie by its ID from an external service
 * using the Remote Repository interface
 *
 * @param string $apikey The user's api key for accessing the remote service
 * @param string $idData Movie ID
 */
class OmdbRepository implements MoviesRepository
{
    private string $apikey;

    public function __construct(string $apikey)
    {
        $this->apikey = $apikey;
    }

    private function sendRequest(string $imdbId): ResponseInterface
    {
        $client = new Client();

        return $client->request('GET', 'http://www.omdbapi.com', [
            'query' => [
                'apikey' => $this->apikey,
                'i' => $imdbId,
            ]
        ]);
    }

    public function getData(string $imdbId): array
    {
        $response = $this->sendRequest($imdbId);

        return json_decode($response->getBody()->getContents(), true);
    }
}
