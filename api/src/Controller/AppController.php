<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Manager\PlayerManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("deposer-une-offre", name="job_post")
     * @param Request $request
     * @param PlayerManager $manager
     *
     * @return string
     */
    public function post(Request $request, PlayerManager $manager)
    {
        $job = new Player();
        $form = $this->createForm(PlayerType::class, $job);

        if ($request->isXmlHttpRequest() && $request->isMethod('post')) {
            $form->submit($request->request->get($form->getName()));
            if ($form->isValid()) {
                $manager->create($job);
                return $this->json(['ok']);
            }
        }

        if ($request->isXmlHttpRequest()) {
            return $this->json(['fail']);
        }

        return $this->json(['ok']);
    }

    /**
     * @Route("api/players")
     * @return string
     */
    public function players()
    {

        return $this->json([
            ['id' => 1, 'name' => 'Neymar', 'age' => '24'],
            ['id' => 2,'name' => 'Cavani', 'age' => '23'],
            ['id' => 3,'name' => 'Mbappe', 'age' => '20'],
        ]);
    }

}
