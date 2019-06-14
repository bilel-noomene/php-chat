<?php

namespace App\Helper;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class to shred $entityManage with service classes.
 */
final class EntityManagerAccessor
{
    /**
     * @var EntityManagerInterface
     */
    static public $entityManage;
}