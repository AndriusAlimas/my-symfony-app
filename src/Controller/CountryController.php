<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\String\u;

class CountryController 
{
    #[Route('/','name: homepage')]
    public function homepage() : Response
    {
        return new Response('Country: All');
    }

    #[Route('/country/{country}','name: browse')]
    public function country(string $country = null) : Response
    {
        if($country){
            $country = u(str_replace('-',' ',$country))->title(true);
        }else{
            $country = 'No country seleceted!';
        }
        

        return new Response("Country: {$country}");
    }
}