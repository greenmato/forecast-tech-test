<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\ForecastService;

class StoreForecastCommand extends Command
{
    protected static $defaultName = 'app:store-forecast';

    private $gateway;

    public function __construct(ForecastService $forecastService)
    {
        parent::__construct();
        $this->forecastService = $forecastService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Stores the weather forecast.')
        ;

        $this
            ->setHelp('This command retrieves a 10 day weather forecast from the AccuWeather API and stores it in the database')
        ;

        $this
            ->addArgument('location_key', InputArgument::REQUIRED, 'Location key')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $locationKey = $input->getArgument('location_key');

        $this->forecastService->store5DayForecast($locationKey);
    }
}
