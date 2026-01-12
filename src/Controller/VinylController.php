<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController
{
    #[Route('/', name: 'home')]
    public function homepage():Response{
       return new Response('Title: Welcome to Symfony!!!');
    }
}