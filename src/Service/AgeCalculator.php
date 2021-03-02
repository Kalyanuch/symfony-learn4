<?php
namespace App\Service;

/**
 * Class AgeCalculator
 * @package App\Service
 */
class AgeCalculator
{
    /**
     * @param int $start
     * @return int
     */
    public function calculateYearsToCurrent(int $start): int
    {
        return (int)date('Y') - $start;
    }
}