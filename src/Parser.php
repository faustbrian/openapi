<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi;

use PreemStudio\OpenApi\Data\OpenAPI;

class Parser
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
