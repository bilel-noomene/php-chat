<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity()
 * @Table(name="users")
 */
class User
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
     * @var string
     *
     * @Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $password;

    /**
     * @var ArrayCollection
     *
     * @ManyToMany(targetEntity="Conversation", mappedBy="users")
     */
    private $conversations;

    public function __construct()
    {
        $this->conversations = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Add conversation.
     *
     * @param Conversation $conversation
     *
     * @return User
     */
    public function addConversation(Conversation $conversation): User
    {
        $this->conversations[] = $conversation;

        return $this;
    }

    /**
     * Remove conversation.
     *
     * @param Conversation $conversation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeConversation(Conversation $conversation): bool
    {
        return $this->conversations->removeElement($conversation);
    }

    /**
     * Get users.
     *
     * @return Collection|Conversation[]
     */
    public function getConversations(): Collection
    {
        return $this->conversations;
    }

}