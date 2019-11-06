<?php 

declare(strict_types=1);

namespace App\Controller;

Use Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;


class DefaultController{

    /**
     * @Route(Path="/", name="home")
     */
    public function index(Request $request): Response{
        $name = $request->query->get('name', 'Anonymous');
        return new Response('Hello '.$name);
    }

}


