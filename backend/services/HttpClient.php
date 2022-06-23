<?php

namespace Wtw\backend\services;

use GuzzleHttp\Client;

/**
 * Http client for connecting to an external service http://www.omdbapi.com
 * using the Guzzle HTTP client
 *
 * @param string $apikey
 */
class HttpClient
{
    private $apikey;

    public function __construct(string $apikey)
    {
        $this->apikey = $apikey;
    }

    public function sendRequest(string $imdbId)
    {
        $client = new Client();

        return $client->request('GET', 'http://www.omdbapi.com', [
            'query' => [
                'apikey' => $this->apikey,
                'i' => $imdbId,
            ]
        ]);
    }
}
