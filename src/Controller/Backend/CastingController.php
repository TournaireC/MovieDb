<?php

namespace App\Controller\Backend;

use App\Entity\Casting;
use App\Form\CastingType;
use App\Repository\CastingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route ("/backend/casting", name="backend_")
 */
class CastingController extends AbstractController
{
    /**
     * @Route ("/", name="casting_index")
     */
    public function index(CastingRepository $castingRepository): Response
    {
        return $this->render('backend/casting/index.html.twig', [
            'castings' => $castingRepository->findAll(),
        ]);
    }
}