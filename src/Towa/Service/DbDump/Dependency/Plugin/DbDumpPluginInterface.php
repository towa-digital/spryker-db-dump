<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Towa\Service\DbDump\Dependency\Plugin;

interface DbDumpPluginInterface
{
    /**
     * @return string
     */
    public function getApplicableEngine(): string;

    /**
     * @return void
     */
    public function createDump(): void;

    /**
     * @return void
     */
    public function restoreDump(): void;
}
