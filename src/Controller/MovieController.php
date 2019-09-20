<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Movie;
use App\Entity\Person;
use App\Entity\Casting;
use App\Repository\MovieRepository;
use App\Repository\CastingRepository;

class MovieController extends AbstractController
{
    /**
     * @Route("/", name="movie_list", methods={"GET"})
     */
    public function index(MovieRepository $movieRepo)
    {
        $movies = $movieRepo->findAllOrderedByNameQueryBuilder();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies
        ]);
    }

    /**
     * @Route("/movie/{id}", name="movie_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function show(Movie $movie,CastingRepository $castingRepo)
    {
        $castings = $castingRepo->findByMovieDQL($movie);
        
        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
            'castings' => $castings
        ]);
    }
}
