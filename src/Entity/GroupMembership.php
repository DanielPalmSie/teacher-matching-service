<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "group_memberships")]
class GroupMembership
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Group::class, inversedBy: "groupMemberships")]
    #[ORM\JoinColumn(name: "group_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Group $group;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Student::class, inversedBy: "groupMemberships")]
    #[ORM\JoinColumn(name: "student_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private Student $student;

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

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }
}