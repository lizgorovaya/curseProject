<?php

namespace App\Filter;
use App\Entity\User;

class ProductFilter{
    private ?string $name = null;
    public function __construct(private ?User $user = null)
    {

    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

}