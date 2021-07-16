<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump\Executor;

use SimonRauch\Service\DbDump\DbDumpConfig;
use SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface;
use SimonRauch\Service\DbDump\Exception\NoPluginForEngineFoundException;

class Executor implements ExecutorInterface
{
    /**
     * @var \SimonRauch\Service\DbDump\DbDumpConfig
     */
    protected $config;

    /**
     * @var \SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[]
     */
    protected $dbDumpPlugins;

    /**
     * @param \SimonRauch\Service\DbDump\DbDumpConfig $config
     * @param \SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[] $dbDumpPlugins
     */
    public function __construct(DbDumpConfig $config, array $dbDumpPlugins)
    {
        $this->config = $config;
        $this->dbDumpPlugins = $dbDumpPlugins;
    }

    /**
     * @return void
     */
    public function createDump(): void
    {
        $this->findDbDumpPlugin()->createDump();
    }

    /**
     * @return void
     */
    public function restoreDump(): void
    {
        $this->findDbDumpPlugin()->restoreDump();
    }

    /**
     * @throws \SimonRauch\Service\DbDump\Exception\NoPluginForEngineFoundException
     *
     * @return \SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface
     */
    protected function findDbDumpPlugin(): DbDumpPluginInterface
    {
        foreach ($this->dbDumpPlugins as $dbDumpPlugin) {
            if ($dbDumpPlugin->getApplicableEngine() === $this->config->getDbEngine()) {
                return $dbDumpPlugin;
            }
        }

        throw new NoPluginForEngineFoundException(sprintf(
            'No DbDump plugin found for engine: %s',
            $this->config->getDbEngine()
        ));
    }
}
