# webservco/command

A PHP component/library. Please see [webservco/sandbox](https://webservco.github.io/sandbox/) for an example project using these types of components.

Helpers for command line scripts, including an option parser, output that also goes to the log, and a counter for processed items.

- Related: `webservco/application-default` (runs a command with error handling and timing), `webservco/dependency-container` (provides output services per log channel)

---

## Installation

```shell
composer require webservco/command
```

---

## Usage

A command implements `CommandRunnerInterface`.
An example command from the `webservco/sandbox` project:

```php
use WebServCo\Command\Contract\CommandRunnerInterface;
use WebServCo\Command\Contract\OutputInterface;
use WebServCo\Command\Service\OptionsParser;

final class ExampleCommand implements CommandRunnerInterface
{
    public function __construct(private OutputInterface $output)
    {
    }

    public function run(): bool
    {
        // php bin/import --file=data.csv --dry-run
        $optionsParser = new OptionsParser(['file:', 'dry-run']);
        $file = $optionsParser->getStringValue('file');
        $isDryRun = $optionsParser->getBoolValue('dry-run');

        // Prints the line and writes it to the log at debug level.
        $this->output->write(sprintf('Demonstrating %s', $file));

        return true;
    }
}
```

Create the output service from a PSR-3 logger:

```php
use WebServCo\Command\Factory\OutputServiceFactory;

$outputFactory = new OutputServiceFactory();
// \WebServCo\Command\Contract\OutputInterface
$output = $outputFactory->createOutputService($logger);
```

---

## Contracts

| Interface | Implementation | Purpose |
| --- | --- | --- |
| `Contract\CommandRunnerInterface` | your command | `run()` does the work. |
| `Contract\CommandFactoryInterface` | your factory | Creates the command with its dependencies. |
| `Contract\OptionsParserInterface` | `Service\OptionsParser` | Typed access to long command line options. |
| `Contract\OutputInterface` | `Service\OutputWithLogService` | `echo()` prints, `write()` prints a line and logs it. |
| `Contract\OutputFactoryInterface` | `Factory\OutputServiceFactory` | Creates the output service for a logger. |
| `Contract\ItemsProcessingReportInterface` | `Service\ItemsProcessingReportService` | Counts total and processed items. |
| `Contract\ItemsProcessingReportConsumerInterface` | `Service\AbstractItemsProcessingReportConsumer` | Base for services that report on what they processed. |

Namespaces are relative to `WebServCo\Command\`.

---

## Notes

`OptionsParser` reads the real command line with `getopt()` as soon as it is created, and only knows long options (`--name`). Use `name:` for options that need a value and `name` for flags.

`getBoolValue()` returns `true` when the flag is present. `getStringValue()` throws an `OutOfBoundsException` when the option is missing, and `getNullableStringValue()` returns `null` instead.

---

## Development

```shell
# Start project.
ddev start
# Install dependencies.
ddev c u
# Run all validations.
ddev c c
# Run unit tests.
ddev c test:dox
```

---

## License

[MIT](LICENSE.md)
