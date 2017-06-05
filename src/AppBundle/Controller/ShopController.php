<?php

namespace AppBundle\Controller;

use Kfina\Bewamo\Shop\Service\ShopServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(service="app.shop_controller")
 */
class ShopController extends Controller
{
    /**
     * @var ShopServiceInterface
     */
    private $shopService;

    /**
     * ShopController constructor.
     * @param ShopServiceInterface $shopService
     */
    public function __construct(ShopServiceInterface $shopService)
    {
        $this->shopService = $shopService;
    }


    /**
     * @Route(path="/shops/list")
     */
    public function listAction()
    {
        return new JsonResponse($this->shopService->findAll());
    }
}
