<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        BookRepository $bookRepository,
        CategoryRepository $categoryRepository,
        Request $request
    ): Response {
        $categoryName = $request->query->get('category');
        $categories = $categoryRepository->findAll();

        if ($categoryName !== null && !in_array($categoryName, array_map(fn($c) => $c->getName(), $categories), true)) {
            throw $this->createNotFoundException('Catégorie inconnue.');
        }

        $books = $categoryName
            ? $bookRepository->findByCategoryName($categoryName)
            : $bookRepository->findBy([], ['publishedAt' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'books' => $books,
            'categories' => $categoryRepository->findAll(),
            'activeCategory' => $categoryName,
        ]);
    }


    #[Route('/ui', name: 'app_ui')]
    public function ui(): Response
    {
        return $this->render('home/ui.html.twig');
    }

}
