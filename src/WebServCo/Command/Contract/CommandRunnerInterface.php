<?php

declare(strict_types=1);

namespace WebServCo\Command\Contract;

interface CommandRunnerInterface
{
    public function run(): bool;
}
