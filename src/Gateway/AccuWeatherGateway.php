<?php

namespace App\Gateway;

use GuzzleHttp\Client;

class AccuWeatherGateway
{
    const BASE_URI = 'http://dataservice.accuweather.com/';

    private $client;
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    public function get5DayForecast(string $locationKey): array
    {
        $query = [
            'query' => [
                'apikey' => $this->apiKey,
                'metric' => 'true',
            ]
        ];

        $response = $this->client
            ->get('forecasts/v1/daily/5day/' . $locationKey, $query);

        return json_decode((string) $response->getBody(), true);
    }
}
