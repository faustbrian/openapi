<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#oauth-flow-object
 */
final class OAuthFlow extends Data
{
    public function __construct(
        public string $authorizationUrl,
        public string $tokenUrl,
        public ?string $refreshUrl,
        /** @var array<array<string, string>> */
        public array $scopes,
    ) {
        //
    }
}
