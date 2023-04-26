<?php

declare(strict_types=1);

namespace Tests\Unit;

use BombenProdukt\OpenApi\Data\Components;
use BombenProdukt\OpenApi\Data\Contact;
use BombenProdukt\OpenApi\Data\ExternalDocumentation;
use BombenProdukt\OpenApi\Data\Info;
use BombenProdukt\OpenApi\Data\License;
use BombenProdukt\OpenApi\Data\OpenAPI;
use BombenProdukt\OpenApi\Data\PathItem;
use BombenProdukt\OpenApi\Data\Paths;
use BombenProdukt\OpenApi\Parser;
use BombenProdukt\OpenApi\Reader;

it('can create an instance with a reader', function (): void {
    expect(new Parser(Reader::fromJsonFile('tests/Fixtures/api.github.com.json')))->toBeInstanceOf(Parser::class);
});

it('can parse an OpenAPI document into a DTO', function (): void {
    $data = (new Parser(Reader::fromJsonFile('tests/Fixtures/api.github.com.json')))->parse();

    expect($data)->toBeInstanceOf(OpenAPI::class);
    expect($data->openapi)->toBeString();
    expect($data->info)->toBeInstanceOf(Info::class);
    expect($data->info->title)->toBeString();
    expect($data->info->summary)->toBeNull();
    expect($data->info->description)->toBeString();
    expect($data->info->termsOfService)->toBeString();
    expect($data->info->contact)->toBeInstanceOf(Contact::class);
    expect($data->info->license)->toBeInstanceOf(License::class);
    expect($data->info->version)->toBeString();
    expect($data->jsonSchemaDialect)->toBeNull();
    expect($data->servers)->toBeArray();
    expect($data->paths)->toBeInstanceOf(Paths::class);
    expect($data->paths->items['/'])->toBeInstanceOf(PathItem::class);
    expect($data->paths->items)->toHaveCount(551);
    expect($data->webhooks)->toBeArray();
    expect($data->components)->toBeInstanceOf(Components::class);
    expect($data->components->schemas)->toBeArray();
    expect($data->components->responses)->toBeArray();
    expect($data->components->parameters)->toBeArray();
    expect($data->components->examples)->toBeArray();
    expect($data->components->requestBodies)->toBeNull();
    expect($data->components->headers)->toBeArray();
    expect($data->components->securitySchemes)->toBeNull();
    expect($data->components->links)->toBeNull();
    expect($data->components->callbacks)->toBeNull();
    expect($data->components->pathItems)->toBeNull();
    expect($data->security)->toBeNull();
    expect($data->tags)->toBeArray();
    expect($data->externalDocs)->toBeInstanceOf(ExternalDocumentation::class);
});
