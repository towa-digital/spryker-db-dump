<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SimonRauch\Service\DbDump\Executor;

interface ExecutorInterface
{
    /**
     * @return void
     */
    public function createDump(): void;

    /**
     * @return void
     */
    public function restoreDump(): void;
}
