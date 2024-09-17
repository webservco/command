<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

interface CommandFactoryInterface
{
    public function createCommand(): CommandRunnerInterface;
}
