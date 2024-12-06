<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\OpenApi;

use Illuminate\Support\Arr;
use Symfony\Component\Yaml\Yaml;

final readonly class Reader
{
    private function __construct(
        private array $contents,
    ) {
        //
    }

    public static function fromJson(string $contents): self
    {
        return new self(\json_decode($contents, true, 512, \JSON_THROW_ON_ERROR));
    }

    public static function fromJsonFile(string $path): self
    {
        return self::fromJson(\file_get_contents($path));
    }

    public static function fromYaml(string $contents): self
    {
        return new self(Yaml::parse($contents));
    }

    public static function fromYamlFile(string $path): self
    {
        return new self(Yaml::parseFile($path));
    }

    public function all(): array
    {
        return $this->contents;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return Arr::get($this->contents, $key, $default);
    }
}
