<?php
namespace App\Controller;

use App\Service\AgeCalculator;
use App\Service\RandomNumberGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private const HOTEL_OPENED = 1969;

    public function home(
        LoggerInterface $logger,
        RandomNumberGenerator $randomNumberGenerator,
        AgeCalculator $ageCalculator
    ): Response
    {
        //return new Response('<h1>Hello world!!</h1>');

        $images = [
            [
                'href' => 'images/hotel/intro_room.jpg',
                'class' => 'hidesm',
                'alt' => 'Intro Gallery Room Sample Pictures'
            ],
            [
                'href' => 'images/hotel/intro_pool.jpg',
                'class' => '',
                'alt' => 'Intro Gallery Pool Sample Pictures'
            ],
            [
                'href' => 'images/hotel/intro_dining.jpg',
                'class' => '',
                'alt' => 'Intro Gallery Dining Sample Pictures'
            ],
            [
                'href' => 'images/hotel/intro_attractions.jpg',
                'class' => '',
                'alt' => 'Intro Gallery Attractions Sample Pictures'
            ],
            [
                'href' => 'images/hotel/intro_wedding.jpg',
                'class' => 'hidesm',
                'alt' => 'Intro Gallery Dining Sample Pictures'
            ],
        ];

        $logger->info('Homepage loaded');

        return $this->render('index.html.twig', [
            //'year' => random_int(0, 100),
            //'year' => $randomNumberGenerator->getRandomNumber(0, 100),
            'year' => $ageCalculator->calculateYearsToCurrent(self::HOTEL_OPENED),
            'images' => $images
        ]);
    }

    public function testJson()
    {
        return $this->json([
            'name' => 'Kolya',
            'soname' => 'Shamrylo'
        ]);
    }

    /**
     * @Route("/testAnnotation")
     */
    public function testAnnotation()
    {
        return new Response('<h1>This route defines by annotations!!</h1>');
    }

    /**
     * @Route("/annotationWithMethods", methods={"GET"})
     */
    public function annotationWithMethods()
    {
        return new Response('<h1>This route defines by annotations with methods GET!!</h1>');
    }

    /**
     * @Route("/annotationWithDifferentMethods", methods={"GET", "POST"})
     */
    public function annotationWithDifferentMethods()
    {
        return new Response('<h1>This route defines by annotations with methods GET or POST!!</h1>');
    }
}