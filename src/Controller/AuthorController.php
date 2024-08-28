<?php

namespace App\Controller;

use App\Repository\AutorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    private $authorRepository;

    public function __construct(AutorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    #[Route('/author', name: 'app_autor')]

    public function index():Response
    {
        $authors =$this->authorRepository->findAll();

        return $this->render('Author/index.html.twig',[
            "authors" => $authors
        ]);
    }
}