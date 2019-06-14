<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity()
 * @Table(name="messages")
 */
class Message
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
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    private $date;


    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $content;

    /**
     * @var Conversation
     * @ManyToOne(targetEntity="Conversation", inversedBy="messages")
     */
    private $conversation;

    /**
     * @var User
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $sender;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Message
     */
    public function setDate(\DateTime $date): Message
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Message
     */
    public function setContent(string $content): Message
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Conversation
     */
    public function getConversation(): Conversation
    {
        return $this->conversation;
    }

    /**
     * @param Conversation $conversation
     * @return Message
     */
    public function setConversation(Conversation $conversation): Message
    {
        $this->conversation = $conversation;

        return $this;
    }

    /**
     * @return User
     */
    public function getSender(): User
    {
        return $this->sender;
    }

    /**
     * @param User $sender
     * @return Message
     */
    public function setSender(User $sender): Message
    {
        $this->sender = $sender;

        return $this;
    }
}