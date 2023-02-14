<?php

declare(strict_types=1);

namespace Tests\Unit;

use PreemStudio\OpenApi\Reader;
use PreemStudio\OpenApi\Validator;

it('can validate a JSON string', function (): void {
    $validator = new Validator(Reader::fromJson(file_get_contents('tests/Fixtures/api.github.com.json')));

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
    $validator = new Validator(Reader::fromYaml(file_get_contents('tests/Fixtures/api.github.com.yaml')));

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
