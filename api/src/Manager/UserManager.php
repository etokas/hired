<?php
/**
 * File UserManager.php.
 */

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Firebase\JWT\JWT;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var ParameterBagInterface
     */
    private $bag;

    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $manager, ParameterBagInterface $bag)
    {
        $this->encoder = $encoder;
        $this->manager = $manager;
        $this->bag = $bag;
    }

    public function handle(User $user)
    {
        if(null == $user->getUsername() || null == $user->getPassword()) {
            throw new \InvalidArgumentException('missing username or password', Response::HTTP_BAD_REQUEST);
        }

        
        $entity = $this->manager->getRepository(User::class)->findOneBy(['username' => $user->getUsername()]);

        if($entity) {
            throw new \Exception('user exist', Response::HTTP_FOUND);
        }

        $user->setPassword($this->encoder->encodePassword($user, $user->getPassword()));
        $user->setUuid(self::createUuid($user));
        $user->setToken($this->generateToken($user));
        $this->manager->persist($user);
        $this->manager->flush();
        return $user->toArray();
    }

    public static function createUuid(User $user)
    {
        return Uuid::uuid3(Uuid::NAMESPACE_OID, $user->getUsername());
    }

    public function generateToken(User $user)
    {
        $payload = [
            'un' => $user->getUsername(),
            'jti' => $user->getUuid(),
            'sub' => date('YmdHis')
        ];

        $token = JWT::encode($payload, $this->bag->get('secret'));

        return $token;
    }

    public function getUserByUsername($data)
    {
        /** @var User $user */
        $user = $this->manager->getRepository(User::class)->findOneBy(['username' => $data['username']]);

        if ($user && $this->encoder->isPasswordValid($user, $data['password'])) {
            return $user->toArray();
        }

        return false;
    }


}