<?php

declare(strict_types=1);

namespace WebServCo\Command\Factory;

use Psr\Log\LoggerInterface;
use WebServCo\Command\Contract\OutputFactoryInterface;
use WebServCo\Command\Contract\OutputInterface;
use WebServCo\Command\Service\OutputWithLogService;

final class OutputServiceFactory implements OutputFactoryInterface
{
    public function createOutputService(LoggerInterface $logger): OutputInterface
    {
        return new OutputWithLogService($logger);
    }
}
