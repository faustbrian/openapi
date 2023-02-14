<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use PreemStudio\OpenApi\Data\Example;
use PreemStudio\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $data   = Example::from($reader->get('paths./.get.responses.200.content.application/json.examples.default'));

    expect($data)->toBeInstanceOf(Example::class);
});
