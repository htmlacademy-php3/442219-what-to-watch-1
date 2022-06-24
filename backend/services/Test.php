<?php

use Wtw\backend\services\OmdbRepository;
use GuzzleHttp\Client;

require_once '../../vendor/autoload.php';

$client = new Client();
$repository = new OmdbRepository('571da7ed', $client);
$info = $repository->getData('tt0096895');

echo '<pre>' . print_r($info, true) . '</pre>';
