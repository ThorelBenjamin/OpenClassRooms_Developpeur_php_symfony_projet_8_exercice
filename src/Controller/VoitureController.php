<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VoitureController extends AbstractController
{
    #[Route('/', name: 'voiture.index')]
    public function index(VoitureRepository $repository): Response
    {
        $voiture = $repository->findAll();
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController', 'voiture' => $voiture
        ]);
    }

    #[Route('/voiture/{id}', name: 'voiture.show', requirements: ['id' => '\d+'])]
    public function show(Voiture $voiture): Response
    {
        return $this->render('voiture/voiture.html.twig', [
            'controller_name' => 'VoitureController', 'voiture' => $voiture
        ]);
    }

    #[Route('/voiture/{id}/supprimer', name: 'voiture.delete', requirements: ['id' => '\d+'])]
    public function delete(VoitureRepository $repository, Request $request, int $id, EntityManagerInterface $em): Response
    {
        $voiture = $repository->find($id);
        if (!$voiture) {
            return $this->redirectToRoute('voiture.index');
        }
        $em->remove($voiture);
        $em->flush();
        return $this->redirectToRoute('voiture.index');
    }

    #[Route('/voiture/ajouter', name: 'voiture.add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('voiture.show', ['id' => $voiture->getId()]);
        }
        return $this->render('voiture/nouvelle-voiture.html.twig', [
            'controller_name' => 'VoitureController', 'form' => $form->createView()
        ]);
    }

}
