<?php
declare(strict_types = 1);

namespace BrowscapReaderTest\Helper;

use BrowscapReader\Helper\LoggerHelper;
use Monolog\Logger;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @covers \BrowscapReader\Helper\LoggerHelper
 */
class LoggerHelperTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate() : void
    {
        /** @var OutputInterface|\PHPUnit_Framework_MockObject_MockObject $logger */
        $output = $this->createMock(OutputInterface::class);

        self::assertInstanceOf(Logger::class, LoggerHelper::createDefaultLogger($output));
    }
}
