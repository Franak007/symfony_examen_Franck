<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{


    public function __construct(
        private PublicationRepository $publicationRepository,
        private CommentRepository $commentRepository
    )
    {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $publications = $this->publicationRepository->findAll();
        $comments = $this->commentRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'publications' => $publications,
            'comments' => $comments

        ]);
    }
}
