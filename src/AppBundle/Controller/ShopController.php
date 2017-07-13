<?php

namespace AppBundle\Controller;

use Kfina\Bewamo\Shop\Entity\ShopInterface;
use Kfina\Bewamo\Shop\Service\ShopServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

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
     * @var Serializer
     */
    private $serializer;

    /**
     * ShopController constructor.
     *
     * @param ShopServiceInterface $shopService
     * @param Serializer $serializer
     */
    public function __construct(ShopServiceInterface $shopService, Serializer $serializer)
    {
        $this->shopService = $shopService;
        $this->serializer = $serializer;
    }

    /**
     * @Route(path="/shops/list")
     * @ApiDoc(
     *     resource=true,
     *     resourceDescription="Operations on shops.",
     *     description="Retrieve list of shops."
     * )
     */
    public function listAction()
    {
        return new JsonResponse(
            array_map(function (ShopInterface $shop) {
                return $this->serializer->normalize($shop);
            }, $this->shopService->findAll())
        );
    }
}
