<?php

namespace App\DataFixture;

use App\Entity\Conversation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class ConversationFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $conversation = new Conversation();

            $conversation
                ->addUser($this->getReference('user_' . ($i % 10 + 1)))
                ->addUser($this->getReference('user_' . $faker->numberBetween(11, 20)));

            $manager->persist($conversation);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }
}