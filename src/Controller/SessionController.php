<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="app_session")
     */
    public function index(): Response
    {
        return $this->render('session/index.html.twig', [
            'controller_name' => 'SessionController',
        ]);
    }

    /**
     * @Route("check", name="check")
     */
    public function check($session) {
        $foo = $session->get("foo");

        return new Response($foo);
    }

    /**
     * @Route("set", name="set")
     */
    public function set1($session) {
        $session->set('foo1', 'It was set default'.random_int(1,100));

        return new Response("Session variable foo1 was set");
    }

    /**
     * @Route("default", name="default")
     */
    public function check1($session) {
        $foo1 = $session->get("foo1", "default wasn't set first");

        return new Response($foo1);
    }
}
