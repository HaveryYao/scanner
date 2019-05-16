<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$reader = \League\Csv\AbstractCsv::createFromPath($argv[1]);

foreach ($reader as $csvRow) {
    try {
        $response = $client->request('get', $csvRow[1]);
        if ($response->getStatusCode() != 200) {
            print_r($csvRow[0]);
        }
    } catch (\Exception $ex) {
        print_r($csvRow[0]);
    }
}