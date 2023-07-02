<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

interface OptionsParserInterface
{
    public function getBoolValue(string $option): bool;

    public function getNullableStringValue(string $option): ?string;

    public function getStringValue(string $option): string;
}
