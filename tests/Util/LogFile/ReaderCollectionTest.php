<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Util\LogFile;

use HttpAccessLogParser\Util\Logfile\ReaderCollection;
use HttpAccessLogParser\Util\Logfile\ReaderException;
use HttpAccessLogParser\Util\Logfile\ReaderInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \HttpAccessLogParser\Util\Logfile\ReaderCollection
 */
final class ReaderCollectionTest extends TestCase
{
    /**
     * @var ReaderCollection
     */
    private $object;

    public function setUp() : void
    {
        $this->object = new ReaderCollection();
    }

    public function testAddReader() : void
    {
        /** @var \HttpAccessLogParser\Util\Logfile\ReaderInterface|\PHPUnit_Framework_MockObject_MockObject $reader */
        $reader = $this->createMock(ReaderInterface::class);

        self::assertSame($this->object, $this->object->addReader($reader));
    }

    public function testTestSuccessful() : void
    {
        /** @var \HttpAccessLogParser\Util\Logfile\ReaderInterface|\PHPUnit_Framework_MockObject_MockObject $reader */
        $reader = $this->createMock(ReaderInterface::class);
        $reader
            ->expects(self::once())
            ->method('test')
            ->willReturn(true);

        $this->object->addReader($reader);

        self::assertTrue($this->object->test('Test'));
    }

    public function testTestNotSuccessful() : void
    {
        /** @var \HttpAccessLogParser\Util\Logfile\ReaderInterface|\PHPUnit_Framework_MockObject_MockObject $reader */
        $reader = $this->createMock(ReaderInterface::class);
        $reader
            ->expects(self::once())
            ->method('test')
            ->willReturn(false);

        $this->object->addReader($reader);

        self::assertFalse($this->object->test('Test'));
    }

    /**
     * @throws \HttpAccessLogParser\Util\Logfile\ReaderException
     */
    public function testReadSuccessful() : void
    {
        /** @var \HttpAccessLogParser\Util\Logfile\ReaderInterface|\PHPUnit_Framework_MockObject_MockObject $reader */
        $reader = $this->createMock(ReaderInterface::class);
        $reader
            ->expects(self::once())
            ->method('test')
            ->will(self::returnValue(true));
        $reader
            ->expects(self::once())
            ->method('read')
            ->will(self::returnValue('TestUA'));

        $this->object->addReader($reader);

        self::assertSame('TestUA', $this->object->read('Test'));
    }

    /**
     * @throws \HttpAccessLogParser\Util\Logfile\ReaderException
     */
    public function testReadNotSuccessful() : void
    {
        /** @var \HttpAccessLogParser\Util\Logfile\ReaderInterface|\PHPUnit_Framework_MockObject_MockObject $reader */
        $reader = $this->createMock(ReaderInterface::class);
        $reader
            ->expects(self::once())
            ->method('test')
            ->will(self::returnValue(false));
        $reader
            ->expects(self::never())
            ->method('read')
            ->will(self::returnValue('TestUA'));

        $this->object->addReader($reader);

        $this->expectException(ReaderException::class);
        $this->expectExceptionMessage('Cannot extract user agent string from line "Test"');
        $this->object->read('Test');
    }
}
