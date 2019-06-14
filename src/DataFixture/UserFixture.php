<?php

namespace App\DataFixture;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class UserFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user
                ->setName($faker->name())
                ->setEmail($i === 0 ? 'user@test.com' : $faker->email())
                ->setPassword(password_hash('123456', PASSWORD_BCRYPT));

            $manager->persist($user);

            $this->addReference('user_' . ($i + 1), $user);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}