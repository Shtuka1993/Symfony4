<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RoutesController extends AbstractController
    {
        /**
        * @Route("/blog", name="blog_list")
        */
        public function test(): Response
        {
            return new Response("BLOG");
        }
    }