<?php
declare(strict_types = 1);

namespace HttpAccessLogParser\Util\Logfile;

/**
 * reader collection class
 */
final class ReaderCollection implements ReaderInterface
{
    /**
     * @var \HttpAccessLogParser\Util\Logfile\ReaderInterface[]
     */
    private $readers = [];

    /**
     * adds a new reader to this collection
     *
     * @param \HttpAccessLogParser\Util\Logfile\ReaderInterface $reader
     *
     * @return \HttpAccessLogParser\Util\Logfile\ReaderCollection
     */
    public function addReader(ReaderInterface $reader)
    {
        $this->readers[] = $reader;

        return $this;
    }

    /**
     * @param string $line
     *
     * @return bool
     */
    public function test(string $line) : bool
    {
        foreach ($this->readers as $reader) {
            if ($reader->test($line)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $line
     *
     * @throws \HttpAccessLogParser\Util\Logfile\ReaderException
     *
     * @return string
     */
    public function read(string $line) : string
    {
        foreach ($this->readers as $reader) {
            if ($reader->test($line)) {
                return $reader->read($line);
            }
        }

        throw ReaderException::userAgentParserError($line);
    }
}
