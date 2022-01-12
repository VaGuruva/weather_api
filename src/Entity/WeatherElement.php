<?php

namespace App\Entity;

use App\Repository\WeatherElementRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Prediction;

/**
 * @ORM\Entity(repositoryClass=WeatherElementRepository::class)
 */
class WeatherElement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $measureUnit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToMany(targetEntity=Prediction::class, mappedBy="weatherElements")
     */
    private $predictions;
    
    public function __construct()
    {
        $this->predictions = new ArrayCollection();
    }

    /**
     * @return Collection|Prediction[]
     */
    public function getPredictions(): Collection
    {
        return $this->predictions;
    }

    public function addPrediction(Prediction $prediction): self
    {
        if (!$this->predictions->contains($prediction)) {
            $this->predictions[] = $prediction;
            $prediction->addWeatherElement($this);
        }
        return $this;
    }

    public function removePrediction(Prediction $prediction): self
    {
        if ($this->predictions->removeElement($prediction)) {
            $prediction->removeWeatherElement($this);
        }
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMeasureUnit(): ?string
    {
        return $this->measureUnit;
    }

    public function setMeasureUnit(?string $measureUnit): self
    {
        $this->measureUnit = $measureUnit;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}