<?php


namespace App\Manager;


use App\Entity\Job;
use App\Repository\JobRepository;
use Symfony\Component\String\Slugger\SluggerInterface;

class JobManager
{

    /**
     * @var JobRepository
     */
    private $repository;
    /**
     * @var SluggerInterface
     */
    private $slugger;

    public function __construct
    (
        JobRepository $repository,
        SluggerInterface $slugger
    )
    {
        $this->repository = $repository;
        $this->slugger = $slugger;
    }

    public function create(Job $job)
    {

    }
}