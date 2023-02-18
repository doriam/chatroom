<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column]
    private ?int $to_id = null;

    #[ORM\Column(length: 255)]
    private ?string $message_text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $sent_time = null;

    #[ORM\ManyToOne(inversedBy: 'profils')]
    private ?Profil $profil_id = null;

    #[ORM\ManyToOne(inversedBy: 'msgs')]
    private ?MessageGroup $group_id = null;



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getToId(): ?int
    {
        return $this->to_id;
    }

    public function setToId(int $to_id): self
    {
        $this->to_id = $to_id;

        return $this;
    }

    public function getMessageText(): ?string
    {
        return $this->message_text;
    }

    public function setMessageText(string $message_text): self
    {
        $this->message_text = $message_text;

        return $this;
    }

    public function getSentTime(): ?\DateTimeInterface
    {
        return $this->sent_time;
    }

    public function setSentTime(\DateTimeInterface $sent_time): self
    {
        $this->sent_time = $sent_time;

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
