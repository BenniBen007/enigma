<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
Use App\Repository\OrderRepository;

class OrderDetail
{
    public function __invoke(Environment $twig, OrderRepository $orderRepository, $id)
    {

        $order = $orderRepository->find($id);

        return new Response(
            $twig->render('orders/orderDetail.html.twig', ['order' => $order])
        );
    }
}
