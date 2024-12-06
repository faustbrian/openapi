<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\OpenApi\Data\Components;
use BaseCodeOy\OpenApi\Data\Contact;
use BaseCodeOy\OpenApi\Data\ExternalDocumentation;
use BaseCodeOy\OpenApi\Data\Info;
use BaseCodeOy\OpenApi\Data\License;
use BaseCodeOy\OpenApi\Data\OpenAPI;
use BaseCodeOy\OpenApi\Data\PathItem;
use BaseCodeOy\OpenApi\Data\Paths;
use BaseCodeOy\OpenApi\Parser;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with a reader', function (): void {
    expect(new Parser(Reader::fromJsonFile('tests/Fixtures/api.github.com.json')))->toBeInstanceOf(Parser::class);
});

it('can parse an OpenAPI document into a DTO', function (): void {
    $openAPI = (new Parser(Reader::fromJsonFile('tests/Fixtures/api.github.com.json')))->parse();

    expect($openAPI)->toBeInstanceOf(OpenAPI::class);
    expect($openAPI->openapi)->toBeString();
    expect($openAPI->info)->toBeInstanceOf(Info::class);
    expect($openAPI->info->title)->toBeString();
    expect($openAPI->info->summary)->toBeNull();
    expect($openAPI->info->description)->toBeString();
    expect($openAPI->info->termsOfService)->toBeString();
    expect($openAPI->info->contact)->toBeInstanceOf(Contact::class);
    expect($openAPI->info->license)->toBeInstanceOf(License::class);
    expect($openAPI->info->version)->toBeString();
    expect($openAPI->jsonSchemaDialect)->toBeNull();
    expect($openAPI->servers)->toBeArray();
    expect($openAPI->paths)->toBeInstanceOf(Paths::class);
    expect($openAPI->paths->items['/'])->toBeInstanceOf(PathItem::class);
    expect($openAPI->paths->items)->toHaveCount(551);
    expect($openAPI->webhooks)->toBeArray();
    expect($openAPI->components)->toBeInstanceOf(Components::class);
    expect($openAPI->components->schemas)->toBeArray();
    expect($openAPI->components->responses)->toBeArray();
    expect($openAPI->components->parameters)->toBeArray();
    expect($openAPI->components->examples)->toBeArray();
    expect($openAPI->components->requestBodies)->toBeNull();
    expect($openAPI->components->headers)->toBeArray();
    expect($openAPI->components->securitySchemes)->toBeNull();
    expect($openAPI->components->links)->toBeNull();
    expect($openAPI->components->callbacks)->toBeNull();
    expect($openAPI->components->pathItems)->toBeNull();
    expect($openAPI->security)->toBeNull();
    expect($openAPI->tags)->toBeArray();
    expect($openAPI->externalDocs)->toBeInstanceOf(ExternalDocumentation::class);
});
