<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 4/23/17
 * Time: 10:59 AM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{
    /**
     * @return Genus[]
     */
    public function findAllPublishedOrderedBySize()
    {
       return $this->createQueryBuilder('genus')
           ->andWhere('genus.isPublished = :isPublished')
           ->setParameter('isPublished', true)
           ->orderBy('genus.speciesCount', 'DESC')
           ->getQuery()
           ->execute();
    }
}