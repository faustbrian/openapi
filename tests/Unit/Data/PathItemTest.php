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
use BaseCodeOy\OpenApi\Data\Operation;
use BaseCodeOy\OpenApi\Data\PathItem;
use BaseCodeOy\OpenApi\Data\Response;
use BaseCodeOy\OpenApi\Data\Schema;
use BaseCodeOy\OpenApi\Reader;

it('can create an instance with mapped properties', function (): void {
    $reader = Reader::fromJsonFile('tests/Fixtures/api.github.com.json');
    $pathItem = PathItem::fromReader($reader, $reader->get('paths./'));

    expect($pathItem)->toBeInstanceOf(PathItem::class);
    expect($pathItem->get)->toBeInstanceOf(Operation::class);
    expect($pathItem->get->responses)->toBeArray(Operation::class);
    expect($pathItem->get->responses[200])->toBeInstanceOf(Response::class);
    expect($pathItem->get->responses[200]->content)->toBeArray();
    expect($pathItem->get->responses[200]->content['application/json'])->toBeInstanceOf(MediaType::class);
    expect($pathItem->get->responses[200]->content['application/json']->schema)->toBeInstanceOf(Schema::class);
    expect($pathItem->get->responses[200]->content['application/json']->examples)->toBeArray();
    expect($pathItem->get->responses[200]->content['application/json']->examples['default'])->toBeInstanceOf(Example::class);
});
