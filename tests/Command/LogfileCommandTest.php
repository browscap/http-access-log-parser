<?php
declare(strict_types = 1);

namespace HttpAccessLogParserTest\Command;

use HttpAccessLogParser\Command\LogfileCommand;
use PHPUnit\Framework\TestCase;

/**
 * @covers \HttpAccessLogParser\Command\LogfileCommand
 */
final class LogfileCommandTest extends TestCase
{
    public function testConfigure() : void
    {
        $object = $this->getMockBuilder(LogfileCommand::class)
            ->disableOriginalConstructor()
            ->setMethods(['setName', 'setDescription', 'addArgument', 'addOption'])
            ->getMock();
        $object
            ->expects(self::once())
            ->method('setName')
            ->will(self::returnSelf());
        $object
            ->expects(self::once())
            ->method('setDescription')
            ->will(self::returnSelf());
        $object
            ->expects(self::once())
            ->method('addArgument')
            ->will(self::returnSelf());
        $object
            ->expects(self::exactly(5))
            ->method('addOption')
            ->will(self::returnSelf());

        $class = new \ReflectionClass(LogfileCommand::class);
        $method = $class->getMethod('configure');
        $method->setAccessible(true);

        self::assertNull($method->invoke($object));
    }
}
