<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "teacher_skills")]
class TeacherSkill
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: "teacherSkills")]
    #[ORM\JoinColumn(name: "teacher_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Teacher $teacher;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Skill::class, inversedBy: "teacherSkills")]
    #[ORM\JoinColumn(name: "skill_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Skill $skill;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $proficiencyLevel;

    // Getters and setters

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;
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

    public function getProficiencyLevel(): string
    {
        return $this->proficiencyLevel;
    }

    public function setProficiencyLevel(string $proficiencyLevel): self
    {
        $this->proficiencyLevel = $proficiencyLevel;
        return $this;
    }
}