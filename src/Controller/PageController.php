<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $webSiteName = "Moviz";
        return $this->render('page/index.html.twig', [
            'webSiteName' => $webSiteName,
        ]);
    }
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {

        return $this->render('page/about.html.twig', [
            
        ]);
    }
}
