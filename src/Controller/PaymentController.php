<?php
namespace App\Controller;

use App\Entity\Order;
use App\Model\Cart;
use App\Repository\OrderRepository;
use App\Service\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    #[Route('/order/checkout/{reference}', name: 'checkout')]
    public function payment(OrderRepository $repository, $reference, EntityManagerInterface $em, Cart $cart): Response
    {
        $order = $repository->findOneByReference($reference);
        if (!$order) {
            throw $this->createNotFoundException('This order does not exist');
        }

        $em->persist($order);
        $order->setState(1);
        $em->flush();
        $cart->remove();
        return $this->redirectToRoute('home');
    }



}

