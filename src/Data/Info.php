<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#info-object
 */
final class Info extends Data
{
    public function __construct(
        public string $title,
        public ?string $summary,
        public ?string $description,
        public ?string $termsOfService,
        public ?Contact $contact,
        public ?License $license,
        public string $version,
    ) {
        //
    }
}
