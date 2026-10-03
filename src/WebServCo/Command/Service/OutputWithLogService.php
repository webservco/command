<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use Override;
use Psr\Log\LoggerInterface;
use WebServCo\Command\Contract\OutputInterface;

use const PHP_EOL;

final class OutputWithLogService implements OutputInterface
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    #[Override]
    public function echo(string $message): bool
    {
        echo $message;

        return true;
    }

    /**
     * @phpcs:disable SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     * @param array<mixed> $context
     * @phpcs:enable
     */
    #[Override]
    public function write(string $message, array $context = []): bool
    {
        $this->echo($message);
        $this->echo(PHP_EOL);

        $this->logger->debug($message, $context);

        return true;
    }
}
