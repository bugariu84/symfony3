<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
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

        return new Response(
            $numbersList
        );
    }

    /**
     * @Route("/api/lucky/number/{count}")
     * @param int $count
     * @return JsonResponse
     */
    public function apiNumberAction(int $count) : JsonResponse
    {
        $numbers = [];

        for ($i = 0; $i < $count; $i++) {
            $number = rand(1, 48);

            if (in_array($number, $numbers)) {
                continue;
            }

            $numbers[] = $number;
        }

        return new JsonResponse($numbers);
    }
}