<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MainController.php',
        ]);
    }

    #[Route('/main/test', methods: ['GET'])]
    public function sayHello(): JsonResponse
    {
        return new JsonResponse(['message' => 'Hello World!']);
    }

    #[Route('/main', methods: ['POST'])]
    public function postHello(Request $request)
        {
            $data = json_decode($request->getContent(), true);
            //$data = $request->getContent();
            return new JsonResponse($data);
        }
    
    #[Route('/hello/{nom}', methods: ['GET'])]
    public function bonjour($nom) : Response
    {
        return new Response("Bonjour $nom");
    }

    #[Route('/list', methods: ['GET'])]
    public function list() : JsonResponse
    {
        $data = [
           'nom' => 'Djegherif',
           'prenom' => 'Mickael',
           'age' => 30
            ];
            return new JsonResponse($data, Response::HTTP_OK);
        }
}
