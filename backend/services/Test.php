<?php

use Wtw\backend\services\OmdbRepository;
use Wtw\backend\services\HttpClient;

require_once '../../vendor/autoload.php';

$client = new HttpClient('571da7ed');
$repository = new OmdbRepository($client);
$info = $repository->getData('tt0096895');

echo '<pre>' . print_r($info, true) . '</pre>';
