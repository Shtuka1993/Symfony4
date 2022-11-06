<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class RequestResponseController extends AbstractController
{
    /**
     * @Route("/request/response", name="app_request_response")
     */
    public function index(Request $request): Response
    {
        $isAJAX = $request->isXmlHttpRequest() ? 'YES' : 'NO';
        $what = $request->getPreferredLanguage(['en', 'fr']);
        $isGetPage = $request->query->get('page') ?: 'There is no such GET request';
        $isPostPage = $request->request->get('page') ?: 'There is no such POST request';
        $host = $request->server->get('HTTP_HOST');
        $cookie = $request->cookies->get('PHPSESSID');
        $headerHost = $request->headers->get('host');
        $contentType = $request->headers->get('content-type') ?: '???WAT???';

        return $this->render('request_response/index.html.twig', [
            'controller_name' => 'RequestResponseController',
            'isAJAX' => $isAJAX,
            'what' => $what,
            'get' => $isGetPage,
            'post' => $isPostPage,
            'host' => $host,
            'cookie' => $cookie,
            'hh' => $headerHost,
            'ct' => $contentType,
        ]);
    }

    /**
     * @Route("style", name="style")
     */
    public function style() {
        $response = new Response('<style> ... </style>');
        $response->headers->set('Content-Type', 'text/css');

        return $response;
    }

    /**
     * @Route("configExample", name="configExample")
     */
    public function config() {
        $contentsDir = $this->getParameter('kernel.project_dir').'/contents';

        return new Response($contentsDir);
    }

    /**
     * @Route("JSONexample", name="JSONexample")
     */
    public function jsonExample(): JsonResponse {

        return $this->json(['username' => 'jane.doe']);
    }
}
