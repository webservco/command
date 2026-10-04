<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

interface OptionsParserInterface
{
    /**
     * Typed value getter, named like the other get<Type> methods; renaming would break BC.
     *
     * @SuppressWarnings("PHPMD.BooleanGetMethodName")
     */
    public function getBoolValue(string $option): bool;

    public function getNullableStringValue(string $option): ?string;

    public function getStringValue(string $option): string;
}
