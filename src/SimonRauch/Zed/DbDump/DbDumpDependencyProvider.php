<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Zed\DbDump;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class DbDumpDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_DB_DUMP = 'SERVICE_DB_DUMP';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $this->addDbDumpService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addDbDumpService(Container $container): Container
    {
        $container[static::SERVICE_DB_DUMP] = function (Container $container) {
            return $container->getLocator()->dbDump()->service();
        };

        return $container;
    }
}
