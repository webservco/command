<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

/**
 * A simple report interface for keeping track of processed items.
 */
interface ItemsProcessingReportConsumerInterface
{
    public function getItemsProcessingReport(): ItemsProcessingReportInterface;
}
