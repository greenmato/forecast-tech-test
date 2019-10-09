<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Gateway\AccuWeatherGateway;
use App\Entity\Forecast;

class ForecastService
{
    private $entityManager;
    private $gateway;

    public function __construct(
        EntityManagerInterface $entityManager,
        AccuWeatherGateway $gateway
    ) {
        $this->entityManager = $entityManager;
        $this->gateway = $gateway;
    }

    public function store5DayForecast(string $locationKey): void
    {
        $data = $this->gateway->get5DayForecast($locationKey);

        foreach ($data['DailyForecasts'] as $forecastData) {
            $forecast = new Forecast();

            $forecast->setDate(new \DateTime($forecastData['Date']));
            $forecast->setLocationKey($locationKey);
            $forecast->setMinTempCelcius($forecastData['Temperature']['Minimum']['Value']);
            $forecast->setMaxTempCelcius($forecastData['Temperature']['Maximum']['Value']);
            $forecast->setDayHasPrecipitation($forecastData['Day']['HasPrecipitation']);
            $forecast->setDayPrecipitationType($forecastData['Day']['PrecipitationType'] ?? null);
            $forecast->setDayPrecipitationIntensity($forecastData['Day']['PrecipitationIntensity'] ?? null);
            $forecast->setNightHasPrecipitation($forecastData['Night']['HasPrecipitation']);
            $forecast->setNightPrecipitationType($forecastData['Night']['PrecipitationType'] ?? null);
            $forecast->setNightPrecipitationIntensity($forecastData['Night']['PrecipitationIntensity'] ?? null);
            $forecast->setMobileLink($forecastData['MobileLink']);
            $forecast->setLink($forecastData['Link']);

            $this->entityManager->persist($forecast);
        }

        $this->entityManager->flush();
    }
}
