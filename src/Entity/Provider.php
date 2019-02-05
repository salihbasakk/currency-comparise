<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="adapter_class")
     */
    private $adapterClass;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="requester_class")
     */
    private $requesterClass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAdapterClass(): ?string
    {
        return $this->adapterClass;
    }

    public function setAdapterClass(?string $adapterClass): self
    {
        $this->adapterClass = $adapterClass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequesterClass()
    {
        return $this->requesterClass;
    }

    /**
     * @param mixed $requesterClass
     *
     * @return Provider
     */
    public function setRequesterClass(? string $requesterClass)
    {
        $this->requesterClass = $requesterClass;
        return $this;
    }
}
