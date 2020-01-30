<?php

namespace App\Controller;


use App\Entity\User;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 * @package App\Controller
 * @Route("auth")
 */
class SecurityController extends AbstractController
{

    /**
     * @param Request $request
     * @param UserManager $manager
     *
     * @return User|Response
     * @Route("/register")
     *
     */
    public function register(Request $request, UserManager $manager)
    {
        if (!$request->request->has('username') || !$request->request->has('password')) {

            return $this->json([
                'status' => 400,
                'message' => 'missing username or password'
            ], Response::HTTP_BAD_REQUEST);

        }

        $user = new User();
        $user->setUsername($request->request->get('username'));
        $user->setPassword($request->request->get('username'));

       try {
         return $this->json($manager->handle($user));
       } catch (\Exception $e) {

           return $this->json([
               'status' => Response::HTTP_BAD_REQUEST,
               'message' => $e->getMessage()
           ], Response::HTTP_BAD_REQUEST);
       }
    }

    /**
     * @param Request $request
     * @param UserManager $manager
     * @return Response
     * @Route("/login")
     */
    public function login(Request $request, UserManager $manager)
    {
        if (!$request->request->has('username') || !$request->request->has('password')) {

            return $this->json([
                'status' => 400,
                'message' => 'missing username or password'
            ], Response::HTTP_BAD_REQUEST);
        }

        $response = $manager->getUserByUsername($request->request->all());

        if (!$response) {
            return $this->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'user not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return $this->json($response);
    }

}