<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use BaseCodeOy\OpenApi\Data\Schema;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $data = Schema::fromReader($reader, $reader->get('paths./.get.responses.200.content.application/json.schema'));

    expect($data)->toBeInstanceOf(Schema::class);
});
