<?php
namespace App\Interfaces;

interface WeatherServiceInterface
{
    public function predictionByCity(string $city, string $resource): iterable;
    public function setPrediction(Prediction $prediction);
}