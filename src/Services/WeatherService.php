<?php

namespace App\Services;

use Doctrine\DBAL\Driver\Connection;
use App\Repository\PredictionRepository;
use App\Interfaces\WeatherServiceInterface;
use App\Entity\Prediction;

class WeatherService implements WeatherServiceInterface
{
    private $predictionRepository;

    public function __construct(PredictionRepository $predictionRepository) 
    {
        $this->predictionRepository = $predictionRepository;
    }

    /**
     * Find prediction by city
     */
    public function getPredictionByCity(string $city, string $weatherElement): iterable {

        $cityPredictions = $this->predictionRepository->findByCity($city, $weatherElement);

        return $cityPredictions;
    }
}
