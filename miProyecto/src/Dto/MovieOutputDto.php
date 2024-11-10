<?php
namespace App\Dto;

final class MovieOutputDto
{
    public string $title;
    public float $price;

    public function __construct(string $title = "", float $price = 0.0)
    {
        $this->title = $title;
        $this->price = $price;
    }

    // Getters y Setters como los que ya escribiste
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }
}
