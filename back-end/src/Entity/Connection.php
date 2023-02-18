<?php

namespace App\Entity;

use App\Repository\ConnectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConnectionRepository::class)]
class Connection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $connection_date = null;

    #[ORM\ManyToOne(inversedBy: 'connections')]
    private ?user $id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getConnectionDate(): ?\DateTimeInterface
    {
        return $this->connection_date;
    }

    public function setConnectionDate(\DateTimeInterface $connection_date): self
    {
        $this->connection_date = $connection_date;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
