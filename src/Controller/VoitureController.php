<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VoitureController extends AbstractController
{
    #[Route('/', name: 'app_voiture')]
    public function index(VoitureRepository $repository): Response
    {
        $voiture = $repository->findAll();
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController', 'voiture' => $voiture
        ]);
    }
}
