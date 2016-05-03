<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
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
                continue;
            }

            $numbers[] = $number;
        }

        return new Response(
            implode(',', $numbers)
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