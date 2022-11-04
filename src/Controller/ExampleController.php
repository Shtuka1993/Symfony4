<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Psr\Log\LoggerInterface;

    class ExampleController extends AbstractController
    {
        /**
         * @Route("lucky/number/{max}", name="app_lucky_number")
         */
        public function number(int $max):Response {
            $number = random_int(0, $max);

            return $this->render('/lucky/number.html.twig', ['number' => $number]);
        }

        /**
         * @Route("generate", name="generate")
         */
        public function generate() {

            return new Response($this->generateUrl('app_lucky_number', ['max' => 7]));
        }

        /**
         * @Route("redirectG", name="redirect-generate")
         */
        public function redirectG() {

            return $this->redirectToRoute("generate");
        }

        /**
         * @Route("symfony", name="symfony")
         */
        public function symfony() {

            return $this->redirect('http://symfony.com/doc');
        }

        /**
         * @Route("log", name="log")
         */
        public function log(LoggerInterface $logger) {
            $logger->info('We are logging!');
            
            return new Response("It has been logged");
        }
    }