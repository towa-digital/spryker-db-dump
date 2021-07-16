<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \SimonRauch\Service\DbDump\DbDumpServiceFactory getFactory()
 */
class DbDumpService extends AbstractService implements DbDumpServiceInterface
{
    /**
     * @return void
     */
    public function createDump(): void
    {
        $this->getFactory()
            ->createExecutor()
            ->createDump();
    }

    /**
     * @return void
     */
    public function restoreDump(): void
    {
        $this->getFactory()
            ->createExecutor()
            ->restoreDump();
    }
}
