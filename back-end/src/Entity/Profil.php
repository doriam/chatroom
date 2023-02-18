<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 40)]
    private ?string $first_name = null;

    #[ORM\Column(length: 40)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profil_photo = null;

    #[ORM\OneToOne(inversedBy: 'profil', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $id_u = null;

    #[ORM\OneToMany(mappedBy: 'profil_id', targetEntity: GroupMember::class)]
    private Collection $groupMembers;

    #[ORM\OneToMany(mappedBy: 'profil_id', targetEntity: Message::class)]
    private Collection $profils;

    public function __construct()
    {
        $this->groupMembers = new ArrayCollection();
        $this->profils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getProfilPhoto(): ?string
    {
        return $this->profil_photo;
    }

    public function setProfilPhoto(?string $profil_photo): self
    {
        $this->profil_photo = $profil_photo;

        return $this;
    }

    public function getIdU(): ?user
    {
        return $this->id_u;
    }

    public function setIdU(user $id_u): self
    {
        $this->id_u = $id_u;

        return $this;
    }

    /**
     * @return Collection<int, GroupMember>
     */
    public function getGroupMembers(): Collection
    {
        return $this->groupMembers;
    }

    public function addGroupMember(GroupMember $groupMember): self
    {
        if (!$this->groupMembers->contains($groupMember)) {
            $this->groupMembers->add($groupMember);
            $groupMember->setProfilId($this);
        }

        return $this;
    }

    public function removeGroupMember(GroupMember $groupMember): self
    {
        if ($this->groupMembers->removeElement($groupMember)) {
            // set the owning side to null (unless already changed)
            if ($groupMember->getProfilId() === $this) {
                $groupMember->setProfilId(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, Message>
     */
    public function getProfils(): Collection
    {
        return $this->profils;
    }

    public function addProfils(Message $profils_): self
    {
        if (!$this->profils->contains($profils_)) {
            $this->profils->add($profils_);
            $profils_->setProfilId($this);
        }

        return $this;
    }

    public function removeGroupId(Message $profils_): self
    {
        if ($this->profils->removeElement($profils_)) {
            // set the owning side to null (unless already changed)
            if ($profils_->getProfilId() === $this) {
                $profils_->setProfilId(null);
            }
        }

        return $this;
    }
}
