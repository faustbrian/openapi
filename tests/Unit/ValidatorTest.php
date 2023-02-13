<?php

declare(strict_types=1);

use PreemStudio\OpenApi\Reader;
use PreemStudio\OpenApi\Validator;

it('can validate a JSON string', function () {
    $validator = new Validator(Reader::fromJson(file_get_contents('tests/Fixtures/api.github.com.json')));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a JSON file', function () {
    $validator = new Validator(Reader::fromJsonFile('tests/Fixtures/api.github.com.json'));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a YAML string', function () {
    $validator = new Validator(Reader::fromYaml(file_get_contents('tests/Fixtures/api.github.com.yaml')));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});

it('can validate a YAML file', function () {
    $validator = new Validator(Reader::fromYamlFile('tests/Fixtures/api.github.com.yaml'));

    expect($validator->passes())->toBeTrue();
    expect($validator->fails())->toBeFalse();
    expect($validator->errors())->toBeEmpty();
});
