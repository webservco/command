<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use WebServCo\Command\Contract\ItemsProcessingReportConsumerInterface;
use WebServCo\Command\Contract\ItemsProcessingReportInterface;

abstract class AbstractItemsProcessingReportConsumer implements ItemsProcessingReportConsumerInterface
{
    public function __construct(private ItemsProcessingReportInterface $itemsProcessingReportInterface)
    {
    }

    public function getItemsProcessingReport(): ItemsProcessingReportInterface
    {
        return $this->itemsProcessingReportInterface;
    }
}
