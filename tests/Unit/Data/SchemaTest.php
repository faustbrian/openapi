<?php

declare(strict_types=1);

namespace Tests\Unit\Data;

use PreemStudio\OpenApi\Data\Schema;
use PreemStudio\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $data   = Schema::fromReader($reader, $reader->get('paths./.get.responses.200.content.application/json.schema'));

    expect($data)->toBeInstanceOf(Schema::class);
});
