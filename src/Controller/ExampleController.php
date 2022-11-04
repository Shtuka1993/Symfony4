<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Psr\Log\LoggerInterface;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\HttpFoundation\Request;

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

        /**
         * @Route("email/{email}", name="email")
         */
        public function sendEmail($email, $mailer): Response {
            $new_email = (new Email())
                ->from('hello@example.com')
                ->to($email)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($new_email);

            return new Response("Email was send to " . $email);
        }

        /**
         * @Route("404", name="404")
         */
        public function NotFound() {
            throw $this->createNotFoundException('The page does not exist');
        }

        /**
         * @Route("500", name="500")
         */
        public function bad() {
            throw new \Exception('Something went wrong!');
        }

        /**
         * @Route("request", name="request")
         */
        public function requestDump(Request $request) {
            return $this->render('dump.html.twig', ['var' => $request]);
        }
    }