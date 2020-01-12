<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Manager\JobManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @param JobManager $manager
     * @return string
     */
    public function post(Request $request, JobManager $manager)
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job);

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
     * @Route("tags")
     * @return string
     */
    public function tags()
    {

        return $this->json([
            ['name' => 'php', 'code' => 1],
            ['name' => 'node', 'code' => 2],
            ['name' => 'javascript', 'code' => 3],
        ]);
    }

}
