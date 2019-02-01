<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExchangeRateRepository")
 */
class ExchangeRate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $provider_id;

    /**
     * @ORM\Column(type="float")
     */
    private $usd;

    /**
     * @ORM\Column(type="float")
     */
    private $eur;

    /**
     * @ORM\Column(type="float")
     */
    private $gbp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProviderId(): ?int
    {
        return $this->provider_id;
    }

    public function setProviderId(int $provider_id): self
    {
        $this->provider_id = $provider_id;

        return $this;
    }

    public function getUsd(): ?float
    {
        return $this->usd;
    }

    public function setUsd(float $usd): self
    {
        $this->usd = $usd;

        return $this;
    }

    public function getEur(): ?float
    {
        return $this->eur;
    }

    public function setEur(float $eur): self
    {
        $this->eur = $eur;

        return $this;
    }

    public function getGbp(): ?float
    {
        return $this->gbp;
    }

    public function setGbp(float $gbp): self
    {
        $this->gbp = $gbp;

        return $this;
    }
}
