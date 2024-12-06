<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
        public readonly string $openapi,
        public readonly Info $info,
        public readonly ?string $jsonSchemaDialect,
        /** @var array<Server> */
        public readonly ?array $servers,
        public readonly ?Paths $paths,
        /** @var array<PathItem>|array<Reference>|array<string> */
        public readonly ?array $webhooks,
        public readonly Components $components,
        /** @var array<SecurityRequirement> */
        public readonly ?array $security,
        /** @var array<Tag> */
        public readonly ?array $tags,
        public readonly ?ExternalDocumentation $externalDocs,
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
