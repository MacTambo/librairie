<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    /**
     * @Route("/catalog", name="catalog")
     */
    public function index(BookRepository $bookRepository): Response
    {
        $books=$bookRepository->findAll();

        return $this->render('catalog/catalog.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @param Book $book
     * @return Response
     * @route("/book/{id}", name="bookview")
     */
    public function showBook(Book $book){
        return $this->render('catalog/book.html.twig',[
            'book' => $book,

        ]);
    }
}
