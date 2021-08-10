<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Towa\Service\DbDump\Executor;

use Towa\Service\DbDump\DbDumpConfig;
use Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface;
use Towa\Service\DbDump\Exception\NoPluginForEngineFoundException;

class Executor implements ExecutorInterface
{
    /**
     * @var \Towa\Service\DbDump\DbDumpConfig
     */
    protected $config;

    /**
     * @var \Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[]
     */
    protected $dbDumpPlugins;

    /**
     * @param \Towa\Service\DbDump\DbDumpConfig $config
     * @param \Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[] $dbDumpPlugins
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
     * @throws \Towa\Service\DbDump\Exception\NoPluginForEngineFoundException
     *
     * @return \Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface
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
