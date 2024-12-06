<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\OpenApi\Reader;
use BaseCodeOy\OpenApi\Validator;

it('can validate a JSON string', function (): void {
    $validator = new Validator(Reader::fromJson(\file_get_contents('tests/Fixtures/api.github.com.json')));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a JSON file', function (): void {
    $validator = new Validator(Reader::fromJsonFile('tests/Fixtures/api.github.com.json'));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a YAML string', function (): void {
    $validator = new Validator(Reader::fromYaml(\file_get_contents('tests/Fixtures/api.github.com.yaml')));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a YAML file', function (): void {
    $validator = new Validator(Reader::fromYamlFile('tests/Fixtures/api.github.com.yaml'));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});
