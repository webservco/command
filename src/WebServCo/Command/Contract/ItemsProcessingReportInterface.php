<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

/**
 * A simple report interface for keeping track of processed items.
 */
interface ItemsProcessingReportInterface
{
    public function getTotalItems(): int;

    public function incrementTotalItems(): bool;

    public function getTotalProcessed(): int;

    public function incrementTotalProcessed(): bool;
}
