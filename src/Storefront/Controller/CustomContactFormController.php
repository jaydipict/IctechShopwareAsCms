<?php declare(strict_types=1);

namespace IctechShopwareAsCms\Storefront\Controller;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"storefront"})
 */
class CustomContactFormController extends StorefrontController
{
    private EntityRepository $ictCmsRepository;
    private SystemConfigService $systemConfigService;

    public function __construct(
        EntityRepository $ictCmsRepository,
        SystemConfigService $systemConfigService
    ) {
        $this->ictCmsRepository = $ictCmsRepository;
        $this->systemConfigService = $systemConfigService;
    }

//    function for the store form detail in database
    /**
     * @Route("/form/inquiry", name="frontend.form.inquiry.send", defaults={"csrf_protected"=false},methods={"POST"})
     *
     * @param Request             $request
     * @param SalesChannelContext $salesChannelContext
     */
    public function inCusForm(Request $request, SalesChannelContext $context): JsonResponse
    {
        $response = [];

           $data = $this->ictCmsRepository->create([
                [
                    'name' => $request->get('firstName'),
                    'email' => $request->get('email'),
                    'contact_number' => $request->get('phone'),
                    'subject' => $request->get('subject'),
                    'description' => $request->get('description'),
                ],
            ], $context->getContext());

        $response[] = [
            'type' => 'success'
        ];

        return new JsonResponse($response);
//        return $this->redirectToRoute('frontend.home.page', [
//            'data' => $response,
//            ]);
    }
}
