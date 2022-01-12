<?php

namespace App\Entity;

use App\Repository\PredictionRepository;
use Doctrine\ORM\Mapping as ORM;
//use App\Enity\WeatherElement;

/**
 * @ORM\Entity(repositoryClass=PredictionRepository::class)
 */
class Prediction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="array")
     */
    private $predictions = [];

    /**
    * @ORM\ManyToMany(targetEntity=WeatherElement::class, inversedBy="weatherPredictions")
    * @ORM\JoinTable(name="predictions_weather_elements")
    */
   private $weatherElements;

   public function __construct()
   {
       $this->weatherElements = new ArrayCollection();
   }

   public function getWeatherElements(): ArrayCollection
   {
       return $this->weatherElements;
   }

   public function addWeatherElement(WeatherElement $weatherElement): self
   {
       if (!$this->weatherElements->contains($weatherElement)) {
           $this->weatherElements[] = $weatherElement;
       }
       return $this;
   }

   public function removeWeatherElement(WeatherElement $weatherElement): self
   {
       $this->weatherElements->removeElement($weatherElement);
       return $this;
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPredictions(): ?array
    {
        return $this->predictions;
    }

    public function setPredictions(array $predictions): self
    {
        $this->predictions = $predictions;

        return $this;
    }
}
