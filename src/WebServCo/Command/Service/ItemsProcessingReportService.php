<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use Override;
use WebServCo\Command\Contract\ItemsProcessingReportInterface;

final class ItemsProcessingReportService implements ItemsProcessingReportInterface
{
    public function __construct(private int $totalItems = 0, private int $totalProcessed = 0)
    {
    }

    #[Override]
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    #[Override]
    public function incrementTotalItems(): bool
    {
        $this->totalItems += 1;

        return true;
    }

    #[Override]
    public function getTotalProcessed(): int
    {
        return $this->totalProcessed;
    }

    #[Override]
    public function incrementTotalProcessed(): bool
    {
        $this->totalProcessed += 1;

        return true;
    }
}
