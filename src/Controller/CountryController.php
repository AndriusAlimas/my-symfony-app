<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\String\u;

class CountryController extends AbstractController
{
    #[Route('/')]
    public function homepage() : Response
    {
       return new Response('Welcome to the Country Info Homepage!');
    }

    #[Route('/country/{country}')]
    public function country(?string $country = null) : Response
    {
        if($country){
             $country = u(str_replace('-',' ',$country))->title(true);
        } else {
             $country = 'Unknown Country';  
        }
       
      return new Response(''.$country.'');
    }
}