<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\MovieOutputDto;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class MovieStateProvider implements ProviderInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.collection_provider')]
        private ProviderInterface $collectionProvider
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        // Recuperamos la colección de movies a través del collectionProvider
        $movies = $this->collectionProvider->provide($operation, $uriVariables, $context);
        
        // Mapear la colección de entidades a DTOs
        $movieDtos = [];
        foreach ($movies as $movie) {
            $movieDtos[] = new MovieOutputDto($movie->getTitle(), $movie->getPrice());
        }
        
        return $movieDtos;
    }
}
