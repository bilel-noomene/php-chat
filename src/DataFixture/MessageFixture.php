<?php

namespace App\DataFixture;

use App\Entity\Conversation;
use App\Entity\Message;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class MessageFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        /** @var Conversation[] $conversations */
        $conversations = $manager->getRepository(Conversation::class)->findAll();

        foreach ($conversations as $conversation) {

            for ($i = 0; $i < 5; $i++) {
                $message = new Message();
                $message
                    ->setConversation($conversation)
                    ->setDate($faker->dateTime())
                    ->setSender($conversation->getUsers()->toArray()[$faker->numberBetween(0, 1)])
                    ->setContent($faker->text(250));

                $manager->persist($message);
            }

        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 30;
    }
}