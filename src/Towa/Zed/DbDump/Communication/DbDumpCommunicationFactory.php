<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Towa\Zed\DbDump\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Towa\Service\DbDump\DbDumpServiceInterface;
use Towa\Zed\DbDump\DbDumpDependencyProvider;

class DbDumpCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Towa\Service\DbDump\DbDumpServiceInterface
     */
    public function getDbDumpService(): DbDumpServiceInterface
    {
        return $this->getProvidedDependency(DbDumpDependencyProvider::SERVICE_DB_DUMP);
    }
}
