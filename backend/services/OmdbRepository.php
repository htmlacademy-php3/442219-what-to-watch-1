<?php

namespace Wtw\backend\services;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Repository for getting information about a movie by its ID from an external service
 * using the Remote Repository interface
 *
 * @param string $apikey              The user's api key for accessing the remote service
 * @param ClientInterface $httpClient Psr compatible http client
 * @param string $idData              Movie ID
 */
class OmdbRepository implements MoviesRepository
{
    private string $apikey;
    private ClientInterface $client;

    public function __construct(string $apikey, ClientInterface $httpClient)
    {
        $this->apikey = $apikey;
        $this->client = $httpClient;
    }

    private function sendRequest(string $imdbId): ResponseInterface
    {
        return $this->client->request('GET', 'http://www.omdbapi.com', [
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
