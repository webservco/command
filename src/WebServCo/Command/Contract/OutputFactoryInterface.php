<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

use Psr\Log\LoggerInterface;

interface OutputFactoryInterface
{
    public function createOutputService(LoggerInterface $logger): OutputInterface;
}
