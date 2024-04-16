<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "group_teachers")]
class GroupTeacher
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Group::class, inversedBy: "groupTeachers")]
    #[ORM\JoinColumn(name: "group_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Group $group;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Teacher::class, inversedBy: "groupTeachers")]
    #[ORM\JoinColumn(name: "teacher_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Teacher $teacher;

    // Getters and setters

    public function getGroup(): Group
    {
        return $this->group;
    }

    public function setGroup(Group $group): self
    {
        $this->group = $group;
        return $this;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;
        return $this;
    }
}