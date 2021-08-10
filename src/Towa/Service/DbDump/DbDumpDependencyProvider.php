<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Towa\Service\DbDump;

use Spryker\Service\Kernel\AbstractBundleDependencyProvider;
use Spryker\Service\Kernel\Container;
use Towa\Service\DbDump\Plugin\MysqlDbDumpPlugin;

class DbDumpDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PLUGINS_DB_DUMP = 'PLUGINS_DB_DUMP';

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    public function provideServiceDependencies(Container $container)
    {
        $this->addDbDumpPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    public function addDbDumpPlugins(Container $container): Container
    {
        $container[static::PLUGINS_DB_DUMP] = function () {
            return $this->getDbDumpPlugins();
        };

        return $container;
    }

    /**
     * @return \Towa\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface[]
     */
    protected function getDbDumpPlugins(): array
    {
        return [
            new MysqlDbDumpPlugin(),
        ];
    }
}
