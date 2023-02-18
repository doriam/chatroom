<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 40)]
    private ?string $u_mail = null;

    #[ORM\Column(length: 30)]
    private ?string $u_password = null;

    #[ORM\OneToOne(mappedBy: 'id_u', cascade: ['persist', 'remove'])]
    private ?Profil $profil = null;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Connection::class)]
    private Collection $connections;

    public function __construct()
    {
        $this->connections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getUMail(): ?string
    {
        return $this->u_mail;
    }

    public function setUMail(string $u_mail): self
    {
        $this->u_mail = $u_mail;

        return $this;
    }

    public function getUPassword(): ?string
    {
        return $this->u_password;
    }

    public function setUPassword(string $u_password): self
    {
        $this->u_password = $u_password;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(Profil $profil): self
    {
        // set the owning side of the relation if necessary
        if ($profil->getIdU() !== $this) {
            $profil->setIdU($this);
        }

        $this->profil = $profil;

        return $this;
    }

    /**
     * @return Collection<int, Connection>
     */
    public function getConnections(): Collection
    {
        return $this->connections;
    }

    public function addConnection(Connection $connection): self
    {
        if (!$this->connections->contains($connection)) {
            $this->connections->add($connection);
            $connection->setIdUser($this);
        }

        return $this;
    }

    public function removeConnection(Connection $connection): self
    {
        if ($this->connections->removeElement($connection)) {
            // set the owning side to null (unless already changed)
            if ($connection->getIdUser() === $this) {
                $connection->setIdUser(null);
            }
        }

        return $this;
    }
}
