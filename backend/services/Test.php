<?php

use Wtw\backend\services\MovieRepository;
use Wtw\backend\services\HttpClient;

require_once '../../vendor/autoload.php';

$client = new HttpClient('571da7ed');
$repository = new MovieRepository($client);
$info = $repository->getData('tt0096895');

echo '<pre>' . print_r($info, true) . '</pre>';
