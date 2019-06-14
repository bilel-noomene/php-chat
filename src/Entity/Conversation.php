<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity()
 * @Table(name="conversations")
 */
class Conversation
{

    /**
     * @var int
     *
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    private $id;

    /**
     * @var ArrayCollection|User[]
     *
     * @ManyToMany(targetEntity="User", inversedBy="conversations")
     * @JoinTable(name="users_conversations")
     */
    private $users;

    /**
     * @var ArrayCollection|User[]
     *
     * @OneToMany(targetEntity="Message", mappedBy="conversation")
     * @OrderBy({"date" = "ASC"})
     */
    private $messages;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Add user.
     *
     * @param User $user
     *
     * @return Conversation
     */
    public function addUser(User $user): Conversation
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(User $user): bool
    {
        return $this->users->removeElement($user);
    }

    /**
     * Get users.
     *
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }


    /**
     * Add message.
     *
     * @param Message $message
     *
     * @return Conversation
     */
    public function addMessage(Message $message): Conversation
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message.
     *
     * @param Message $message
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMessage(Message $message): bool
    {
        return $this->users->removeElement($message);
    }

    /**
     * Get users.
     *
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

}