<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
