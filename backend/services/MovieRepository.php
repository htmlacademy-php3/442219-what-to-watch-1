<?php

namespace Wtw\backend\services;

use Wtw\backend\services\RemoteRepository;
use Wtw\backend\services\HttpClient;

/**
 * Repository for getting information about a movie by its ID from an external service
 * using the Remote Repository interface
 *
 * @param HttpClient $httpClient Http client for connecting to an external service
 * @param string     $idData     Movie ID
 */
class MovieRepository implements RemoteRepository
{
    /**
     * @var ClientInterface PSR compatible http client
     */
    private $client;

    public function __construct(HttpClient $httpClient)
    {
        $this->client = $httpClient;
    }

    public function getData(string $idData): ?array
    {
        $response = $this->client->sendRequest($idData);

        return json_decode($response->getBody()->getContents(), true);
    }
}
