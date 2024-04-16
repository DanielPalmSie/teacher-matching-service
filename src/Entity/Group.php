<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual(value: 1)]
    private int $minSize;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual(value: 1)]
    private int $maxSize;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinSize(): int
    {
        return $this->minSize;
    }

    public function setMinSize(int $minSize): self
    {
        $this->minSize = $minSize;
        return $this;
    }

    public function getMaxSize(): int
    {
        return $this->maxSize;
    }

    public function setMaxSize(int $maxSize): self
    {
        $this->maxSize = $maxSize;
        return $this;
    }
}
