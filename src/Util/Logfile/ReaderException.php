<?php
declare(strict_types = 1);

namespace BrowscapReader\Util\Logfile;

use BrowscapPHP\Exception\DomainException;

/**
 * Exception to handle errors while reading a log file
 */
final class ReaderException extends DomainException
{
    public static function userAgentParserError(string $line) : self
    {
        return new self(sprintf('Cannot extract user agent string from line "%s"', $line));
    }
}
