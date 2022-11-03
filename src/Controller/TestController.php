<?php
    namespace App\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class TestController extends AbstractController
    {   
        /**
         * @Route("/test/testing")
         */
        public function action() {
           $number = random_int(0, 100);

           return  $this->render('test/test.html.twig', ['number' => $number,]);
        }
    }