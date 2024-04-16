<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $skillName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $skillCategory;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillName(): string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;
        return $this;
    }

    public function getSkillCategory(): string
    {
        return $this->skillCategory;
    }

    public function setSkillCategory(string $skillCategory): self
    {
        $this->skillCategory = $skillCategory;
        return $this;
    }
}