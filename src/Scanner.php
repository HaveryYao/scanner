<?php

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$reader = \League\Csv\Reader::createFromPath($argv[1]);

foreach ($reader as $csvRow) {
    try {
        $response = $client->request('get', $csvRow[0]);
        if ($response->getStatusCode() != 200) {
            throw new \Exception();
        }
    } catch (\Exception $ex) {
        echo $csvRow[0] . PHP_EOL;
    }
}