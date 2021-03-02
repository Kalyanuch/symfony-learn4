<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function home(LoggerInterface $logger): Response
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
            'year' => random_int(0, 100),
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
}