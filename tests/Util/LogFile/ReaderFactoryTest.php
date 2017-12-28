<?php
declare(strict_types = 1);

namespace BrowscapReaderTest\Util\LogFile;

use BrowscapReader\Util\Logfile\ReaderCollection;
use BrowscapReader\Util\Logfile\ReaderFactory;

/**
 * @covers \BrowscapReader\Util\Logfile\ReaderFactory
 */
final class ReaderFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testFactoryCreatesCollection() : void
    {
        self::assertInstanceOf(ReaderCollection::class, ReaderFactory::factory());
    }
}
