<?php

declare(strict_types=1);

namespace WebServCo\Command\Service;

use Override;
use WebServCo\Command\Contract\ItemsProcessingReportConsumerInterface;
use WebServCo\Command\Contract\ItemsProcessingReportInterface;

abstract class AbstractItemsProcessingReportConsumer implements ItemsProcessingReportConsumerInterface
{
    public function __construct(private ItemsProcessingReportInterface $itemsProcessingReport)
    {
    }

    #[Override]
    public function getItemsProcessingReport(): ItemsProcessingReportInterface
    {
        return $this->itemsProcessingReport;
    }
}
