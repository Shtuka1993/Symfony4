<?php
    namespace App\Controller;
    
    use Symfony\Component\HttpFoundation\Response;
    class TestController
    {
        public function action() {
           $number = random_int(0, 100);

           return new Response('<html><body>Number: ' . $number . '</body></html>');
        }
    }