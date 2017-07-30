<?php

namespace Dafiti\AdminBundle\Service;

use Dafiti\AdminBundle\Entity\Product;
use Doctrine\ORM\EntityManager;

/**
* Product Service
*/
class ProductService
{

    /**
     * Entity Manager.
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Gets lastest products.
     *
     * @return array
     */
    public function getLastest()
    {
        $products = $this->em
            ->getRepository(Product::class)
            ->findLastest();

        /* Do somethings with products if you need it */

        return $products;
    }
}
