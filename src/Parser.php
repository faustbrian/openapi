<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi;

use BombenProdukt\OpenApi\Data\OpenAPI;

final class Parser
{
    public function __construct(private Reader $reader)
    {
        //
    }

    public function parse(): OpenAPI
    {
        return OpenAPI::fromReader($this->reader);
    }
}
