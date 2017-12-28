<?php
declare(strict_types = 1);

namespace BrowscapReader\Util\Logfile;

/**
 * abstract parent class for all readers
 */
final class ReaderFactory
{
    /**
     * @return \BrowscapReader\Util\Logfile\ReaderCollection
     */
    public static function factory() : ReaderCollection
    {
        $collection = new ReaderCollection();

        $collection->addReader(new ApacheCommonLogFormatReader());

        return $collection;
    }
}
