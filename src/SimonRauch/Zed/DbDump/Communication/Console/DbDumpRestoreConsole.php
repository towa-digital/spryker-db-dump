<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Zed\DbDump\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \SimonRauch\Zed\DbDump\Communication\DbDumpCommunicationFactory getFactory()
 */
class DbDumpRestoreConsole extends Console
{
    public const COMMAND_NAME = 'db-dump:restore';

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(static::COMMAND_NAME);
        $this->setDescription('Restores database dump.');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->getFactory()
            ->getDbDumpService()
            ->restoreDump();

        return Console::CODE_SUCCESS;
    }
}
