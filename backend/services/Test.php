<?php

use Wtw\backend\services\OmdbRepository;

require_once '../../vendor/autoload.php';

$repository = new OmdbRepository('571da7ed');
$info = $repository->getData('tt0096895');

echo '<pre>' . print_r($info, true) . '</pre>';
