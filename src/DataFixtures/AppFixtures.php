<?php

namespace App\DataFixtures;

use App\Entity\Plant;
use App\Entity\PlantType;
use App\Entity\User;
use App\Entity\Visitor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\fr_FR\Address;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AppFixtures extends Fixture
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();
        $faker->addProvider(new Address($faker));



        $manager->flush();

        for ($i = 0; $i < 500; $i++) {


            $plant = new Plant();
            $plant->setDescription($faker->paragraph());
            $plant->setVisitor($this->getRandomUser());
            $plant->setPlantType($this->getRandomPlantType());
            $plant->setAddAt(new \DateTimeImmutable('now'));
        }

        $manager->flush();


    }

    public function getRandomUser() : Visitor
    {
        $visitorRepository = $this->entityManager->getRepository(Visitor::class);

        $queryBuilder = $visitorRepository->createQueryBuilder('v');
        $queryBuilder->orderBy('RAND()');
        $queryBuilder->setMaxResults(1);
        $randomUser = $queryBuilder->getQuery()->getOneOrNullResult();
        return $randomUser;
    }

    public function getRandomPlantType() : PlantType
    {
        $plantTypeRepository = $this->entityManager->getRepository(PlantType::class);

        $queryBuilder = $plantTypeRepository->createQueryBuilder('p');
        $queryBuilder->orderBy('RAND()');
        $queryBuilder->setMaxResults(1);
        $randomPlantType = $queryBuilder->getQuery()->getOneOrNullResult();
        return $randomPlantType;
    }
}
