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
        $client = new Client(['base_uri' => 'http://www.omdbapi.com']);

        return $client->request('GET', '?i=' . $imdbId . '&apikey=' . $this->apikey);
    }
}
