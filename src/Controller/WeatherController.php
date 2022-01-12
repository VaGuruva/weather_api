<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Services\WeatherService;

class WeatherController extends AbstractController
{
    /**
     * @Route("/weather", name="weather")
     */
    public function index(): Response
    {
        return $this->render('weather/index.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }

    /**
     * @Route("/predictions/{weatherElement}/{city}", name="predictions")
     * @param Request $request
     * @return Response
     */
    public function predictions(Request $request, WeatherService $weatherService): Response
    {
        $cityName = $request->get('city');
        $weatherElement = $request->get('weatherElement');
        $response = [];

        try{
            $predictions = $weatherService->getPredictionByCity($cityName, $weatherElement);
            if(isset($predictions)){
                $response = $predictions;
            }
        }
        catch(\Exception $e){
            error_log($e->getMessage());
        }
        
        return $this->json([
            'predictions' => $response
        ]); 
    }
}
