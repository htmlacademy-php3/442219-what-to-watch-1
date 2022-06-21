<?php

namespace Wtw\backend\services;

/**
 * Interface for interacting with the remote API
 *
 * @param string $idData Information Identifier
 */
interface RemoteRepository
{
    public function getData(string $idData);
}
