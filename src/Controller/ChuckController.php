<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
Use Psr\Log\LoggerInterface;

class ChuckController {
    
    public function index(Client $client, LoggerInterface $logger) : Response {
        $response = $client->get('/jokes/random');
        $data = json_decode($response->getBody()->getContents());

        $logger->info('Nouvelle blague', ['data' => dump($data)]);

        $maPhrase = $data->value;

        //throw new \Exception('coucou');

        return new Response(<<<HTML
    
        <html>  
            <head></head>
            <body>$maPhrase</body>
        </html>
    
        HTML);
    }
}