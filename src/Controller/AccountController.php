<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AccountController extends AbstractController
{
    #[Route('/mes-livres', name: 'app_user_books')]
    #[IsGranted('ROLE_USER')]
    public function myBooks(BookRepository $bookRepository): Response
    {
        $user = $this->getUser();
        $books = $bookRepository->findBy(['owner' => $user], ['publishedAt' => 'DESC']);

        return $this->render('book/user_books.html.twig', [
            'books' => $books,
        ]);
    }
}
