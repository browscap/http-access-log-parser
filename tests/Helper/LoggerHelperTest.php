<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Helper;

use HttpAccessLogParser\Helper\LoggerHelper;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @covers \HttpAccessLogParser\Helper\LoggerHelper
 */
class LoggerHelperTest extends TestCase
{
    public function testCreate() : void
    {
        /** @var OutputInterface $logger */
        $output = $this->createMock(OutputInterface::class);

        self::assertInstanceOf(Logger::class, LoggerHelper::createDefaultLogger($output));
    }
}
