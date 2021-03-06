<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Util\LogFile;

use HttpAccessLogParser\Util\Logfile\ReaderException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \HttpAccessLogParser\Util\Logfile\ReaderException
 */
class ReaderExceptionTest extends TestCase
{
    public function testUserAgentParserError() : void
    {
        $exception = ReaderException::userAgentParserError('42');

        self::assertInstanceOf(ReaderException::class, $exception);
        self::assertSame(
            'Cannot extract user agent string from line "42"',
            $exception->getMessage()
        );
    }
}
