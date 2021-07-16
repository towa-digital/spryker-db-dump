# Spryker DB Dump Tool

Creates and restores database dumps for Spryker.

**ONLY WORKS WITH MARIADB/MYSQL FOR NOW**

## Installation

Install the package:

```bash
composer require --dev simonrauch/spryker-db-dump
```

Add namespace as core namespace in your configs:

```php
$config[KernelConstants::CORE_NAMESPACES] = [
    ...
    'SimonRauch',
];
```

Add console commands in the `ConsoleDependencyProvider`:

```php
class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Symfony\Component\Console\Command\Command[]
     */
    protected function getConsoleCommands(Container $container)
    {
        ...
        $commands[] = new DbDumpExportConsole();
        $commands[] = new DbDumpRestoreConsole();

        return $commands;
    }
    ...
}
```

## Usage

To create a dump run:

```bash
vendor/bin/console db-dump:export
```

To restore a dump run:

```bash
vendor/bin/console db-dump:restore
```
