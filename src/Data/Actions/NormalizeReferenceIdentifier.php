<?php

declare(strict_types=1);

namespace PreemStudio\OpenApi\Data\Actions;

final class NormalizeReferenceIdentifier
{
    public static function execute(string $identifier): string
    {
        return str_replace('/', '.', substr($identifier, 2));
    }
}
