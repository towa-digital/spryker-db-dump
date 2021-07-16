<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump;

use SimonRauch\Service\DbDump\Executor\Executor;
use SimonRauch\Service\DbDump\Executor\ExecutorInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;

/**
 * @method \SimonRauch\Service\DbDump\DbDumpConfig getConfig()
 */
class DbDumpServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \SimonRauch\Service\DbDump\Executor\ExecutorInterface
     */
    public function createExecutor(): ExecutorInterface
    {
        return new Executor(
            $this->getConfig(),
            $this->getDbDumpPlugins()
        );
    }

    /**
     * @return \SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[]
     */
    protected function getDbDumpPlugins(): array
    {
        return $this->getProvidedDependency(DbDumpDependencyProvider::PLUGINS_DB_DUMP);
    }
}
