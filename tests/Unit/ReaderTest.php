<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\OpenApi\Reader;

it('can read a JSON string', function (): void {
    expect(Reader::fromJson(\file_get_contents('tests/Fixtures/api.github.com.json')))->toBeInstanceOf(Reader::class);
});

it('can read a JSON file', function (): void {
    expect(Reader::fromJsonFile('tests/Fixtures/api.github.com.json'))->toBeInstanceOf(Reader::class);
});

it('can read a YAML string', function (): void {
    expect(Reader::fromYaml(\file_get_contents('tests/Fixtures/api.github.com.yaml')))->toBeInstanceOf(Reader::class);
});

it('can read a YAML file', function (): void {
    expect(Reader::fromYamlFile('tests/Fixtures/api.github.com.yaml'))->toBeInstanceOf(Reader::class);
});
