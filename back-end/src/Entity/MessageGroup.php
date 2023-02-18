<?php

namespace App\Entity;

use App\Repository\MessageGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageGroupRepository::class)]
class MessageGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 30)]
    private ?string $group_name = null;

    #[ORM\OneToMany(mappedBy: 'group_id', targetEntity: GroupMember::class)]
    private Collection $groupMembers;

    #[ORM\ManyToMany(targetEntity: Message::class, mappedBy: 'group_id')]
    private Collection $messages;

    #[ORM\OneToMany(mappedBy: 'group_id', targetEntity: Message::class)]
    private Collection $msgs;

    public function __construct()
    {
        $this->groupMembers = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->msgs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getGroupName(): ?string
    {
        return $this->group_name;
    }

    public function setGroupName(string $group_name): self
    {
        $this->group_name = $group_name;

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
            $groupMember->setGroupId($this);
        }

        return $this;
    }

    public function removeGroupMember(GroupMember $groupMember): self
    {
        if ($this->groupMembers->removeElement($groupMember)) {
            // set the owning side to null (unless already changed)
            if ($groupMember->getGroupId() === $this) {
                $groupMember->setGroupId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->addGroupId($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            $message->removeGroupId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMsgs(): Collection
    {
        return $this->msgs;
    }

    public function addMsg(Message $msg): self
    {
        if (!$this->msgs->contains($msg)) {
            $this->msgs->add($msg);
            $msg->setGroupId($this);
        }

        return $this;
    }

    public function removeMsg(Message $msg): self
    {
        if ($this->msgs->removeElement($msg)) {
            // set the owning side to null (unless already changed)
            if ($msg->getGroupId() === $this) {
                $msg->setGroupId(null);
            }
        }

        return $this;
    }
}
