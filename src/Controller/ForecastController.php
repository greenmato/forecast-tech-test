<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Forecast;

class ForecastController extends AbstractController
{
    /**
     * @Route("/forecasts", name="forecasts")
     */
    public function all()
    {
        $repository = $this->getDoctrine()->getRepository(Forecast::class);
        $forecasts = $repository->findAll();

        return $this->render('forecast/forecasts.html.twig', [
            'forecasts' => $forecasts,
        ]);
    }
}
