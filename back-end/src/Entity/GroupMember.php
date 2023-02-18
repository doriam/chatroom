<?php

namespace App\Entity;

use App\Repository\GroupMemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupMemberRepository::class)]
class GroupMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $joined_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $left_time = null;

    #[ORM\ManyToOne(inversedBy: 'groupMembers')]
    private ?Profil $profil_id = null;

    #[ORM\ManyToOne(inversedBy: 'groupMembers')]
    private ?MessageGroup $group_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }




    public function getJoinedTime(): ?\DateTimeInterface
    {
        return $this->joined_time;
    }

    public function setJoinedTime(\DateTimeInterface $joined_time): self
    {
        $this->joined_time = $joined_time;

        return $this;
    }

    public function getLeftTime(): ?\DateTimeInterface
    {
        return $this->left_time;
    }

    public function setLeftTime(?\DateTimeInterface $left_time): self
    {
        $this->left_time = $left_time;

        return $this;
    }

    public function getProfilId(): ?Profil
    {
        return $this->profil_id;
    }

    public function setProfilId(?Profil $profil_id): self
    {
        $this->profil_id = $profil_id;

        return $this;
    }

    public function getGroupId(): ?MessageGroup
    {
        return $this->group_id;
    }

    public function setGroupId(?MessageGroup $group_id): self
    {
        $this->group_id = $group_id;

        return $this;
    }
}
