<?php

namespace App\Controller;

use App\Entity\Plant;
use App\Entity\PlantType;
use App\Entity\User;
use App\Entity\Visitor;
use App\Repository\PlantRepository;
use App\Repository\PlantTypeRepository;
use App\Repository\VisitorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Faker\Provider\fr_FR\Address;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\Response\CurlResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlantTypeController extends AbstractController
{
    private $entityManager;
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->httpClient = $httpClient;
    }

    #[Route('/AddData', name: 'app_plant_type')]
    public function index(PlantTypeRepository $plantTypeRepository, VisitorRepository $visitorRepository, PlantRepository $plantRepository): Response
    {


        $faker = Factory::create();
        $faker->addProvider(new Address($faker));

        $url = "https://my-api.plantnet.org/v2/species?api-key=2b10JNZwvDpLnWGG9EacE7vu";
        $content = "Contenu de la réponse";
        $statusCode = 200;
        try {
            $response = $this->httpClient->request('GET', $url);
            $content = $response->getContent();
            $statusCode = $response->getStatusCode();
            $data = json_decode($content, true);
            // Initialisation des données du type de Plantes
            for($i=0; $i<33000; $i += 1000) {
                for ($j = 0; $j < 50; $j++) {
                    $plantType = new PlantType();
                    $plantType->setNom($data[$i + $j]['scientificNameWithoutAuthor']);
                    $plantTypeRepository->save($plantType, true);
                }
            }
            // Initialisation des données Plantes
            for ($i = 0; $i < 100; $i++) {
                $user = new Visitor();
                $user->setEmail($faker->unique()->email);
                $user->setRoles(['ROLE_USER']);
                $user->setPassword(password_hash('password123', PASSWORD_DEFAULT));
                $user->setUsername($faker->userName);
                $user->setAdress($faker->address);
                $user->setCity($faker->city);
                $user->setCountry('France');
                $user->setCreatedAt( new \DateTimeImmutable('now'));
                $visitorRepository->save($user, true);
            }
            for ($i = 0; $i < 500; $i++) {
                $plant = new Plant();
                $user= $this->getRandomUser($visitorRepository);
                $plant->setDescription($faker->paragraph());
                $plant->setVisitor($user);
                $user->addPlant($plant);
                $plant->setPlantType($this->getRandomPlantType($plantTypeRepository));
                $plant->setAddAt(new \DateTimeImmutable('now'));
                $plantRepository->save($plant, true);
            }
            // Initialisation des données Visiteur


            return new Response($content, $statusCode);
        } catch (TransportExceptionInterface $e) {
            return new Response('An error occurred.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getRandomUser($visitorRepository)
    {
        $allEntities = $visitorRepository->findAll();
        $randomEntity = null;

        if (!empty($allEntities)) {
            $randomIndex = array_rand($allEntities);
            $randomEntity = $allEntities[$randomIndex];
        }

        return $randomEntity;
    }

    public function getRandomPlantType($plantRepository) : PlantType
    {
        $allEntities = $plantRepository->findAll();
        $randomEntity = null;
        if (!empty($allEntities)) {
            $randomIndex = array_rand($allEntities);
            $randomEntity = $allEntities[$randomIndex];
        }

        return $randomEntity;
    }

    public function getRandomPlant($plantRepository) : Plant
    {
        $allEntities = $plantRepository->findAll();
        $randomEntity = null;
        if (!empty($allEntities)) {
            $randomIndex = array_rand($allEntities);
            $randomEntity = $allEntities[$randomIndex];
        }
        return $randomEntity;
    }


}
