<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "student_skills")]
class StudentSkill
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Student::class, inversedBy: "studentSkills")]
    #[ORM\JoinColumn(name: "student_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Student $student;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Skill::class, inversedBy: "studentSkills")]
    #[ORM\JoinColumn(name: "skill_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Skill $skill;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $desiredLevel;

    // Getters and setters

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }

    public function getSkill(): Skill
    {
        return $this->skill;
    }

    public function setSkill(Skill $skill): self
    {
        $this->skill = $skill;
        return $this;
    }

    public function getDesiredLevel(): string
    {
        return $this->desiredLevel;
    }

    public function setDesiredLevel(string $desiredLevel): self
    {
        $this->desiredLevel = $desiredLevel;
        return $this;
    }
}