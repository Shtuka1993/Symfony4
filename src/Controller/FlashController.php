<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FlashController extends AbstractController
{

    /**
     * @Route("SetFlash", name="SetFlash")
     */
    public function setFlash($session) {
        $flash = true;
        $session->set("flash", $flash);
    }

    /**
     * @Route("/flash", name="app_flash")
     */
    public function index(Request $request, $session): Response
    {
        if($session->get("flash")) {
            $this->addFlash(
                'notice',
                'we have setted flash'
            );

            return $this->redirect('/');
        } else {
            $request->getSession()->getFlashBag()->add(
                'warning',
                'no flash was added'
            );

            return $this->render('flash/index.html.twig', [
                'controller_name' => 'FlashController',
            ]);
        }
    }
}
