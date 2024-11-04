<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use BaseCodeOy\OpenApi\Data\Example;
use BaseCodeOy\OpenApi\Data\MediaType;
use BaseCodeOy\OpenApi\Data\Operation;
use BaseCodeOy\OpenApi\Data\PathItem;
use BaseCodeOy\OpenApi\Data\Response;
use BaseCodeOy\OpenApi\Data\Schema;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $data = PathItem::fromReader($reader, $reader->get('paths./'));

    expect($data)->toBeInstanceOf(PathItem::class);
    expect($data->get)->toBeInstanceOf(Operation::class);
    expect($data->get->responses)->toBeArray(Operation::class);
    expect($data->get->responses[200])->toBeInstanceOf(Response::class);
    expect($data->get->responses[200]->content)->toBeArray();
    expect($data->get->responses[200]->content['application/json'])->toBeInstanceOf(MediaType::class);
    expect($data->get->responses[200]->content['application/json']->schema)->toBeInstanceOf(Schema::class);
    expect($data->get->responses[200]->content['application/json']->examples)->toBeArray();
    expect($data->get->responses[200]->content['application/json']->examples['default'])->toBeInstanceOf(Example::class);
});
