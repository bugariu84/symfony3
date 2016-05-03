<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends FOSRestController
{
    /**
     * @Route("/lucky/number/{count}")
     * @param int $count
     * @return Response
     */
    public function numberAction(int $count) : Response
    {
        $numbers = [];

        for ($i = 0; $i < $count; $i++) {
            $number = rand(1, 48);

            if (in_array($number, $numbers)) {
                $number = rand(1, 48);
            }

            $numbers[] = $number;
        }

        $numbersList = implode(", ", $numbers);
        $html = $this->render('lucky/number.html.twig', ['lucky_numbers' => $numbersList]);

        return new Response($html);
    }

    /**
     * @Route("/api/lucky/number/{count}")
     * @param int $count
     * @return JsonResponse
     */
    public function apiNumberAction(int $count) : Response
    {
        $numbers = [];

        for ($i = 0; $i < $count; $i++) {
            $number = rand(1, 48);

            if (in_array($number, $numbers)) {
                continue;
            }

            $numbers[] = $number;
        }

        $view = $this
            ->view('', 200)
            ->setTemplate('lucky/number.html.twig')
            ->setTemplateData([
                'var1' => 'var1',
                'var2' => 0.324,
                'var5' => new \stdClass(),
                'lucky_numbers' => $numbers,
            ]);

        return $this->handleView($view);
    }
}