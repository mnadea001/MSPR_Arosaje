<?php

namespace App\Controller;

use App\Entity\PlantType;
use App\Repository\PlantTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\Response\CurlResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlantTypeController extends AbstractController
{

    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/plant', name: 'app_plant_type')]
    public function index(PlantTypeRepository $plantTypeRepository): Response
    {
        $url = "https://my-api.plantnet.org/v2/species?api-key=2b10JNZwvDpLnWGG9EacE7vu";
;

        try {
            $response = $this->httpClient->request('GET', $url);
            $content = $response->getContent();
            $statusCode = $response->getStatusCode();

            $data = json_decode($content, true);
            foreach ($data as $item) {
                $plantType = new PlantType();
                $plantType->setNom($item['scientificNameWithoutAuthor']);
                $plantTypeRepository->save($plantType, true);
            }


            return new Response($content, $statusCode);
        } catch (TransportExceptionInterface $e) {
            // Handle transport exceptions
            return new Response('An error occurred.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}
