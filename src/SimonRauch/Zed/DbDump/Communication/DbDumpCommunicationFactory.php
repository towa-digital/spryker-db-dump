<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Zed\DbDump\Communication;

use SimonRauch\Service\DbDump\DbDumpServiceInterface;
use SimonRauch\Zed\DbDump\DbDumpDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class DbDumpCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \SimonRauch\Service\DbDump\DbDumpServiceInterface
     */
    public function getDbDumpService(): DbDumpServiceInterface
    {
        return $this->getProvidedDependency(DbDumpDependencyProvider::SERVICE_DB_DUMP);
    }
}
