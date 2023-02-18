<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    #[Route('/new', name: 'app_user', methods: ['GET'])]
    public function createUser(Request $request, EntityManagerInterface $em): void
    {
        /*return new Response(
            'hola gente',
            Response::HTTP_OK
        );*/

        $request = $this->transformJsonBody($request);
        dump($request);
    }

    protected function transformJsonBody(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        if ($data === null) {
            return $request;
        }
        $request->request->replace($data);
        return $request;
    }
}
