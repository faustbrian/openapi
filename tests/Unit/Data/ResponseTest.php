<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Data;

use BaseCodeOy\OpenApi\Data\Example;
use BaseCodeOy\OpenApi\Data\MediaType;
use BaseCodeOy\OpenApi\Data\Response;
use BaseCodeOy\OpenApi\Data\Schema;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $response = Response::fromReader($reader, $reader->get('paths./.get.responses.200'));

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->content)->toBeArray();
    expect($response->content['application/json'])->toBeInstanceOf(MediaType::class);
    expect($response->content['application/json']->schema)->toBeInstanceOf(Schema::class);
    expect($response->content['application/json']->examples)->toBeArray();
    expect($response->content['application/json']->examples['default'])->toBeInstanceOf(Example::class);
});
