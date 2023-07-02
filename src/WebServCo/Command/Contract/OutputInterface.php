<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

interface OutputInterface
{
    /**
     * Output a message, with no EOL.
     */
    public function echo(string $message): bool;

    /**
     * Output a message with EOL, and optionally do other processing (eg. write a log).
     *
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $context
     * @phpcs:enable
     */
    public function write(string $message, array $context = []): bool;
}
