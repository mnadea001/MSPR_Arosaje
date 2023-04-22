<?php

namespace App\Controller;

use App\Entity\PlantSitting;
use App\Form\PlantSittingType;
use App\Repository\PlantSittingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/plant/sitting')]
class PlantSittingController extends AbstractController
{
    #[Route('/', name: 'app_plant_sitting_index', methods: ['GET'])]
    public function index(PlantSittingRepository $plantSittingRepository): Response
    {
        return $this->render('plant_sitting/index.html.twig', [
            'plant_sittings' => $plantSittingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_plant_sitting_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PlantSittingRepository $plantSittingRepository): Response
    {
        $plantSitting = new PlantSitting();
        $form = $this->createForm(PlantSittingType::class, $plantSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plantSittingRepository->save($plantSitting, true);

            return $this->redirectToRoute('app_plant_sitting_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plant_sitting/new.html.twig', [
            'plant_sitting' => $plantSitting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_plant_sitting_show', methods: ['GET'])]
    public function show(PlantSitting $plantSitting): Response
    {
        return $this->render('plant_sitting/show.html.twig', [
            'plant_sitting' => $plantSitting,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_plant_sitting_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlantSitting $plantSitting, PlantSittingRepository $plantSittingRepository): Response
    {
        $form = $this->createForm(PlantSittingType::class, $plantSitting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plantSittingRepository->save($plantSitting, true);

            return $this->redirectToRoute('app_plant_sitting_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plant_sitting/edit.html.twig', [
            'plant_sitting' => $plantSitting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_plant_sitting_delete', methods: ['POST'])]
    public function delete(Request $request, PlantSitting $plantSitting, PlantSittingRepository $plantSittingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plantSitting->getId(), $request->request->get('_token'))) {
            $plantSittingRepository->remove($plantSitting, true);
        }

        return $this->redirectToRoute('app_plant_sitting_index', [], Response::HTTP_SEE_OTHER);
    }
}
