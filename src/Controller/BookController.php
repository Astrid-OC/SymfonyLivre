<?php
//comme le require

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    #[Route('/books', name: 'app_book')]
    public function index():Response
    {
        // $title= "Mes livres";
        $books =$this->bookRepository->findAll();

        // dd($books);

        return $this->render('book/index.html.twig', [
            "books" =>$books
        ]);
    }
}