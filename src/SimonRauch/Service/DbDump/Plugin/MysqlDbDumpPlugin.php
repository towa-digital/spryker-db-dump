<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump\Plugin;

use SimonRauch\Service\DbDump\Dependency\Plugin\DbDumpPluginInterface;
use Spryker\Service\Kernel\AbstractPlugin;
use Spryker\Zed\Propel\PropelConfig;

/**
 * @method \SimonRauch\Service\DbDump\DbDumpConfig getConfig()
 */
class MysqlDbDumpPlugin extends AbstractPlugin implements DbDumpPluginInterface
{
    /**
     * @return string
     */
    public function getApplicableEngine(): string
    {
        return PropelConfig::DB_ENGINE_MYSQL;
    }

    /**
     * @return void
     */
    public function createDump(): void
    {
        passthru($this->buildDumpCommand());
    }

    /**
     * @return void
     */
    public function restoreDump(): void
    {
        passthru($this->buildRestoreCommand());
    }

    /**
     * @return string
     */
    protected function buildRestoreCommand(): string
    {
         return sprintf(
             'gzip -dc %s/%s.sql.gz | mysql --user=%s --password=%s --host=%s --port=%s %s',
             $this->getConfig()->getDbDumpFileDirectory(),
             $this->getConfig()->getDbDumpFileName(),
             $this->getConfig()->getDbUsername(),
             $this->getConfig()->getDbPassword(),
             $this->getConfig()->getDbHost(),
             $this->getConfig()->getDbPort(),
             $this->getConfig()->getDbName()
         );
    }

    /**
     * @return string
     */
    protected function buildDumpCommand(): string
    {
        return sprintf(
            'mysqldump --user=%s --password=%s --host=%s --port=%s %s | gzip -c  > %s/%s.sql.gz',
            $this->getConfig()->getDbUsername(),
            $this->getConfig()->getDbPassword(),
            $this->getConfig()->getDbHost(),
            $this->getConfig()->getDbPort(),
            $this->getConfig()->getDbName(),
            $this->getConfig()->getDbDumpFileDirectory(),
            $this->getConfig()->getDbDumpFileName()
        );
    }
}
