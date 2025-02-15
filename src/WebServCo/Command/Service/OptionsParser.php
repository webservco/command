<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use OutOfBoundsException;
use UnexpectedValueException;
use WebServCo\Command\Contract\OptionsParserInterface;

use function array_key_exists;
use function getopt;
use function is_array;
use function is_bool;
use function is_string;

final class OptionsParser implements OptionsParserInterface
{
    /**
     * @var array<string,string|bool>
     */
    private array $parsedOptions = [];

    /**
     * @param array<int,string> $availableOptions
     */
    public function __construct(private array $availableOptions)
    {
        $this->parseOptions();
    }

    public function getBoolValue(string $option): bool
    {
        if (!array_key_exists($option, $this->parsedOptions)) {
            // Option not set, use false.
            return false;
        }

        /**
         * Phan false positive:
         * "Returning $this->parsedOptions[$option] of type bool|string
         * but getStringValue() is declared to return string (bool is incompatible)"
         *
         * Workaround: declare variable..
         *
         * @todo phan test case.
         */
        $value = $this->parsedOptions[$option];

        if (!is_bool($value)) {
            throw new UnexpectedValueException('Value is not of the expected type.');
        }

        /** PHP uses FALSE: https://www.php.net/manual/en/function.getopt.php#123135 */
        return !$value;
    }

    public function getNullableStringValue(string $option): ?string
    {
        try {
            return $this->getStringValue($option);
        } catch (OutOfBoundsException) {
            return null;
        }
    }

    public function getStringValue(string $option): string
    {
        if (!array_key_exists($option, $this->parsedOptions)) {
            throw new OutOfBoundsException('Option not available.');
        }

        /**
         * Phan false positive:
         * "Returning $this->parsedOptions[$option] of type bool|string
         * but getStringValue() is declared to return string (bool is incompatible)"
         *
         * Workaround: declare variable..
         *
         * @todo phan test case.
         */
        $value = $this->parsedOptions[$option];

        if (!is_string($value)) {
            throw new UnexpectedValueException('Value is not of the expected type.');
        }

        return $value;
    }

    private function parseOptions(): bool
    {
        $options = getopt('', $this->availableOptions);

        if (!is_array($options)) {
            throw new UnexpectedValueException('Options is not an array.');
        }

        foreach ($options as $key => $value) {
            if (!is_bool($value) && !is_string($value)) {
                throw new UnexpectedValueException('Value is not of the expected type.');
            }
            $this->parsedOptions[$key] = $value;
        }

        return true;
    }
}
