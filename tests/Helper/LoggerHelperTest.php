<?php
declare(strict_types = 1);

namespace BrowscapReaderTest\Helper;

use BrowscapReader\Helper\LoggerHelper;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @covers \BrowscapReader\Helper\LoggerHelper
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
