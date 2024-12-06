<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Data;

use BaseCodeOy\OpenApi\Data\Schema;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $schema = Schema::fromReader($reader, $reader->get('paths./.get.responses.200.content.application/json.schema'));

    expect($schema)->toBeInstanceOf(Schema::class);
});
