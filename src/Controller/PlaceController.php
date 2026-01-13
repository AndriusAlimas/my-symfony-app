<?php

use Symfony\Component\HttpFoundation\Response;

class PlaceController 
{
    public function homepage() : Response
    {
        return new Response('Title: Places');
    }
}