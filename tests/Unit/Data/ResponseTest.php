<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use PreemStudio\OpenApi\Data\Example;
use PreemStudio\OpenApi\Data\MediaType;
use PreemStudio\OpenApi\Data\Response;
use PreemStudio\OpenApi\Data\Schema;
use PreemStudio\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $data = Response::fromReader($reader, $reader->get('paths./.get.responses.200'));

    expect($data)->toBeInstanceOf(Response::class);
    expect($data->content)->toBeArray();
    expect($data->content['application/json'])->toBeInstanceOf(MediaType::class);
    expect($data->content['application/json']->schema)->toBeInstanceOf(Schema::class);
    expect($data->content['application/json']->examples)->toBeArray();
    expect($data->content['application/json']->examples['default'])->toBeInstanceOf(Example::class);
});
