<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 17/01/19
 * Time: 22:53
 */

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(GenreRepository $genreRepository, MovieRepository $movieRepository)
    {
        $movies = $movieRepository->findAll();
        $genres = $genreRepository->findAll();
        $moviesNovelty = $movieRepository->findByNovelty(true);

        return $this->render('home/index.html.twig', [
            'movies' => $movies,
            'genres' => $genres,
            'moviesNovelty' => $moviesNovelty,
        ]);
    }
}
