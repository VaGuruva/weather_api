<?php
namespace App\Interfaces;
use App\Entity\Prediction;

interface WeatherServiceInterface
{
    public function getPredictionByCity(string $city, string $resource): iterable;
}
