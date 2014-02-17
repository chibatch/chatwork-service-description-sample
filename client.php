<?php

require 'vendor/autoload.php';

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

$client = new Client('https://api.chatwork.com/', array(
    'request.options' => array(
        'headers' => array(
            'X-ChatWorkToken' => 'API_TOKEN',
        ),
    ),
));

try {
    $description = ServiceDescription::factory(__DIR__.'/resource.json');
    $client->setDescription($description);

    $command = $client->getCommand('getMyTasks', array(
        "assigned_by_account_id" => 147174
    ));

    $result = $command->execute();

    print_r($result);
} catch (Exception $e) {
    echo $e;
}

