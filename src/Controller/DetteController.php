<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DetteController extends AbstractController
{
    #[Route('/dette/ajouter', name: 'dette.ajouter', methods: ['GET', 'POST'])]
    public function addDebt(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dette = new Dette();
        $form = $this->createForm(DetteType::class, $dette);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Définir les propriétés de la dette si nécessaire
            $entityManager->persist($dette);
            $entityManager->flush();
    
            $this->addFlash('success', 'Dette ajoutée avec succès.');
            return $this->redirectToRoute('clients.index');
        }
    
        return $this->render('dette/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
