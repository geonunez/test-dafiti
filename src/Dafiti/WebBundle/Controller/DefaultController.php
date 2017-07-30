<?php

namespace Dafiti\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default Controller.
 */
class DefaultController extends Controller
{
    /**
     * Shows the lastest products.
     *
     * @Route("/", name="dafiti_web.default.index")
     * @Template()
     */
    public function indexAction()
    {
        $productService = $this->get('dafiti_admin.product.service');
        $products = $productService->getLastest();

        return [
            "products" => $products
        ];
    }
}
