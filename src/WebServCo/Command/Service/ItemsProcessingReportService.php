<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use WebServCo\Command\Contract\ItemsProcessingReportInterface;

final class ItemsProcessingReportService implements ItemsProcessingReportInterface
{
    public function __construct(private int $totalItems = 0, private int $totalProcessed = 0)
    {
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    public function incrementTotalItems(): bool
    {
        $this->totalItems += 1;

        return true;
    }

    public function getTotalProcessed(): int
    {
        return $this->totalProcessed;
    }

    public function incrementTotalProcessed(): bool
    {
        $this->totalProcessed += 1;

        return true;
    }
}
