<?php


namespace App\Manager;


use App\Entity\Player;
use App\Repository\PlayerRepository;
use Symfony\Component\String\Slugger\SluggerInterface;

class PlayerManager
{

    /**
     * @var PlayerRepository
     */
    private $repository;
    /**
     * @var SluggerInterface
     */
    private $slugger;

    public function __construct
    (
        PlayerRepository $repository,
        SluggerInterface $slugger
    )
    {
        $this->repository = $repository;
        $this->slugger = $slugger;
    }

    public function create(Player $job)
    {

    }
}