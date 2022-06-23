<?php

namespace Wtw\backend\services;

/**
 * Interface for interacting with the remote API
 *
 * @param string $idData Information Identifier
 *
 * @return array
 */
interface MoviesRepository
{
    public function getData(string $imdbId): array;
}
