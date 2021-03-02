<?php
namespace App\Service;

use Psr\Log\LoggerInterface;

/**
 * Class RandomNumberGenerator
 * @package App\Service
 */
class RandomNumberGenerator
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * RandomNumberGenerator constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param int $start
     * @param int $end
     * @return int
     * @throws \Exception
     */
    public function getRandomNumber($start = 0, $end = 1000000): int
    {
        $result = random_int($start, $end);

        $this->logger->info('Generating number ' . $result);

        return $result;
    }
}