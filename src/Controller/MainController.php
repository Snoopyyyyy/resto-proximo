<?php

namespace App\Controller;

use App\Repository\ProprietaireRepository;
use App\Repository\RestaurantRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(VilleRepository $villeRepository, RestaurantRepository $restaurantRepository, ProprietaireRepository $proprietaireRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'villes' => $villeRepository->findBy([], ['name' => 'ASC']),
        ]);
    }
}
