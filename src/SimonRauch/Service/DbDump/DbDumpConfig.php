<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump;

use SimonRauch\Shared\DbDump\DbDumpConstants;
use Spryker\Service\Kernel\AbstractBundleConfig;
use Spryker\Shared\Propel\PropelConstants;

class DbDumpConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getDbUsername(): string
    {
        return $this->get(PropelConstants::ZED_DB_USERNAME);
    }

    /**
     * @return string
     */
    public function getDbPassword(): string
    {
        return $this->get(PropelConstants::ZED_DB_PASSWORD);
    }

    /**
     * @return string
     */
    public function getDbHost(): string
    {
        return $this->get(PropelConstants::ZED_DB_HOST);
    }

    /**
     * @return string
     */
    public function getDbPort(): string
    {
        return $this->get(PropelConstants::ZED_DB_PORT);
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->get(PropelConstants::ZED_DB_DATABASE);
    }

    /**
     * @return string
     */
    public function getDbEngine(): string
    {
        return $this->get(PropelConstants::ZED_DB_ENGINE);
    }

    /**
     * @return string
     */
    public function getDbDumpFileName(): string
    {
        return $this->get(DbDumpConstants::DUMP_FILE_FILENAME, 'db-dump');
    }

    /**
     * @return string
     */
    public function getDbDumpFileDirectory(): string
    {
        return $this->get(DbDumpConstants::DUMP_FILE_DIRECTORY, APPLICATION_ROOT_DIR);
    }
}
