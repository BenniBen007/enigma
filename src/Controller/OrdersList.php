<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
Use App\Repository\OrderRepository;

class OrdersList
{
    public function __invoke(Environment $twig, OrderRepository $orderRepository)
    {
     
        $list = $orderRepository->findAll();
        
        return new Response(
            $twig->render('orders/ordersList.html.twig', ['orders' => $list])
        );
    }
}
