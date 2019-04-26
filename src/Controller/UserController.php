<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * @Route("/create-user", name="user", methods={"POST"})
     * 
     */
    public function createUser(Requests $request, $firstName, $lastName, $email, $pwd)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User($firstName, $lastName, $email, $pwd);
        $em->persist($user);
        $em->flush();


        return $this->json([
            'message' => "user Created!"
        ]);
    }
}
