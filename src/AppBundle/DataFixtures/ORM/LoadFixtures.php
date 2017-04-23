<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 4/23/17
 * Time: 10:26 AM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Genus;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml', $manager);
    }
}