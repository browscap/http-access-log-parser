<?php
declare(strict_types = 1);

namespace BrowscapReader\Util\Logfile;

/**
 * reader collection class
 */
final class ReaderCollection implements ReaderInterface
{
    /**
     * @var \BrowscapReader\Util\Logfile\ReaderInterface[]
     */
    private $readers = [];

    /**
     * adds a new reader to this collection
     *
     * @param \BrowscapReader\Util\Logfile\ReaderInterface $reader
     *
     * @return \BrowscapReader\Util\Logfile\ReaderCollection
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
     * @throws \BrowscapReader\Util\Logfile\ReaderException
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
