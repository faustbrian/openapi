<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#openapi-object
 */
final class OpenAPI extends Data
{
    public function __construct(
        public string $openapi,
        public Info $info,
        public ?string $jsonSchemaDialect,
        /** @var Server[] */
        public ?array $servers,
        public ?Paths $paths,
        /** @var PathItem[]|Reference[]|string[] */
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
            servers: MapArray::execute($reader, $reader->get('servers'), Server::class),
            paths: Paths::fromReader($reader, $reader->get('paths')),
            webhooks: MapArray::execute($reader, $reader->get('webhooks'), ['string', PathItem::class]),
            components: Components::from($reader->get('components')),
            security: MapArray::execute($reader, $reader->get('security'), SecurityRequirement::class),
            tags: MapArray::execute($reader, $reader->get('tags'), Tag::class),
            externalDocs: ExternalDocumentation::from($reader->get('externalDocs')),
        );
    }
}
