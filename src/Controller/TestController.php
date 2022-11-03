<?php
    namespace App\Controller;
    
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class TestController
    {
        /**
         * @Route("/test/testing")
         */

        public function action() {
           $number = random_int(0, 100);

           return new Response('<html><body>Number: ' . $number . '</body></html>');
        }
    }