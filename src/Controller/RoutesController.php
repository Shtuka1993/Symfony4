<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RoutesController extends AbstractController
    {
        /**
        * @Route("/test", name="test")
        */
        public function test(): Response
        {

            return new Response("TEST");
        }

        public function list() {

            return new Response("LIST:");
        }

        public function show($id) {

            return new Response($id);
        }

        public function contact() {

            return new Response("CONTACT");
        }

        public function item($page) {

            return new Response("BLOG: " . $page);
        }
    }