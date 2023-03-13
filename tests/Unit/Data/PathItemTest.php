<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use PreemStudio\OpenApi\Data\Example;
use PreemStudio\OpenApi\Data\MediaType;
use PreemStudio\OpenApi\Data\Operation;
use PreemStudio\OpenApi\Data\PathItem;
use PreemStudio\OpenApi\Data\Response;
use PreemStudio\OpenApi\Data\Schema;
use PreemStudio\OpenApi\Reader;

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
