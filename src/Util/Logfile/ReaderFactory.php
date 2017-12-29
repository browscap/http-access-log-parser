<?php
declare(strict_types = 1);

namespace HttpAccessLogParser\Util\Logfile;

/**
 * abstract parent class for all readers
 */
final class ReaderFactory
{
    /**
     * @return \HttpAccessLogParser\Util\Logfile\ReaderCollection
     */
    public static function factory() : ReaderCollection
    {
        $collection = new ReaderCollection();

        $collection->addReader(new ApacheCommonLogFormatReader());

        return $collection;
    }
}
