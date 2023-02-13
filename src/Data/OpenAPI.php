<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data;

use PreemStudio\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#openapi-object
 */
class OpenAPI extends Data
{
    public function __construct(
        public string $openapi,
        public Info $info,
        public ?string $jsonSchemaDialect,
        /** @var Server[] */
        public ?array $servers,
        public ?Paths $paths,
        /** @var string[] | PathItem[] | Reference[] */
        public ?array $webhooks,
        public Components $components,
        /** @var SecurityRequirement[] */
        public ?array $security,
        /** @var Tag[] */
        public ?array $tags,
        public ?ExternalDocumentation $externalDocs,
    ) {
        //
    }

    public static function fromReader(Reader $reader): self
    {
        return new self(
            openapi: $reader->get('openapi'),
            info: Info::from($reader->get('info')),
            jsonSchemaDialect: $reader->get('jsonSchemaDialect'),
            servers: $reader->get('servers'),
            paths: Paths::fromArray($reader->get('paths')),
            webhooks: $reader->get('webhooks'),
            components: Components::from($reader->get('components')),
            security: $reader->get('security'),
            tags: $reader->get('tags'),
            externalDocs: ExternalDocumentation::from($reader->get('externalDocs')),
        );
    }
}
