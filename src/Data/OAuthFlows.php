<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#oauth-flows-object
 */
final class OAuthFlows extends Data
{
    public function __construct(
        public ?OAuthFlow $implicit,
        public ?OAuthFlow $password,
        public ?OAuthFlow $clientCredentials,
        public ?OAuthFlow $authorizationCode,
    ) {
        //
    }
}
