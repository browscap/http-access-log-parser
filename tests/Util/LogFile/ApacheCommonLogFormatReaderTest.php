<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Util\LogFile;

use HttpAccessLogParser\Util\Logfile\ApacheCommonLogFormatReader;
use HttpAccessLogParser\Util\Logfile\ReaderException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \HttpAccessLogParser\Util\Logfile\ApacheCommonLogFormatReader
 */
final class ApacheCommonLogFormatReaderTest extends TestCase
{
    /**
     * @var ApacheCommonLogFormatReader
     */
    private $object;

    public function setUp() : void
    {
        $this->object = new ApacheCommonLogFormatReader();
    }

    public function testTestFails() : void
    {
        self::assertFalse($this->object->test('test'));
    }

    /**
     * @throws \HttpAccessLogParser\Util\Logfile\ReaderException
     */
    public function testReadFails() : void
    {
        $this->expectException(ReaderException::class);
        $this->expectExceptionMessage('test');
        $this->object->read('test');
    }

    public function regexproviderOk() : array
    {
        return [
            ['87.139.99.29 - - 6 0 - - [07/Aug/2014:18:36:10 +0200] - "-" 408 - "-" "-" - www.geld.de'],
        ];
    }

    /**
     * @dataProvider regexproviderOk
     *
     * @param string $ua
     */
    public function testTestOk(string $ua) : void
    {
        self::assertTrue($this->object->test($ua));
    }
}
