<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Util\LogFile;

use HttpAccessLogParser\Util\Logfile\ReaderCollection;
use HttpAccessLogParser\Util\Logfile\ReaderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \HttpAccessLogParser\Util\Logfile\ReaderFactory
 */
final class ReaderFactoryTest extends TestCase
{
    public function testFactoryCreatesCollection() : void
    {
        self::assertInstanceOf(ReaderCollection::class, ReaderFactory::factory());
    }
}
