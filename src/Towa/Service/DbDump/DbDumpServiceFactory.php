<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Towa\Service\DbDump;

use Spryker\Service\Kernel\AbstractServiceFactory;
use Towa\Service\DbDump\Executor\Executor;
use Towa\Service\DbDump\Executor\ExecutorInterface;

/**
 * @method \Towa\Service\DbDump\DbDumpConfig getConfig()
 */
class DbDumpServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Towa\Service\DbDump\Executor\ExecutorInterface
     */
    public function createExecutor(): ExecutorInterface
    {
        return new Executor(
            $this->getConfig(),
            $this->getDbDumpPlugins()
        );
    }

    /**
     * @return \Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[]
     */
    protected function getDbDumpPlugins(): array
    {
        return $this->getProvidedDependency(DbDumpDependencyProvider::PLUGINS_DB_DUMP);
    }
}
