<?php

namespace Dafiti\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
* Product Repository
*/
class ProductRepository extends EntityRepository
{

    /**
     * Finds lastest products.
     *
     * @return array
     */
    public function findLastest()
    {
        $products = $this
            ->findBy([], ['created' => 'DESC']);

        return $products;
    }
}
