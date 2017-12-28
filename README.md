# Browser Capabilities PHP Project - Logfile reader

This is a log file reader for apache log files to parse useragents.

[![Build Status](https://secure.travis-ci.org/browscap/browscap-file-reader.png?branch=master)](http://travis-ci.org/browscap/browscap-file-reader) [![Code Coverage](https://scrutinizer-ci.com/g/browscap/browscap-file-reader/badges/coverage.png?s=61cb32ca83d2053ed9b140690b6e18dfa00e4639)](https://scrutinizer-ci.com/g/browscap/browscap-file-reader/) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/browscap/browscap-file-reader/badges/quality-score.png?s=db1cc1699b1cb6ac6ae46754ef9612217eba5526)](https://scrutinizer-ci.com/g/browscap/browscap-file-reader/)

## Installation

Run the command below to install via Composer

```shell
composer require browscap/browscap-file-reader 
```

## the CLI Log command

The `log` command parses a single access log file or a directory with access log files and writes the results into an output file. 

```php
vendor/bin/browscap-file-reader browscap:log
```

### options

- `output` (required) the path to a log file where the results are stored
- `cache` (optional) the relative path to your cache directory
- `log-file` (optional) the relative path to an access log file
- `log-dir` (optional) the relative path to directory with the log files
- `include` (optional) a glob compatible list of files which should be included, only used in comination with the `log-dir` option
- `exclude` (optional) a glob compatible list of files which should be excluded from parsing, only used in comination with the `log-dir` option

NOTE: One of both options `log-file` and `log-dir` is required.
NOTE: At the moment only Apache access logs are supported.

## Issues and feature requests

Please report your issues and ask for new features on the GitHub Issue Tracker
at https://github.com/browscap/browscap-file-reader/issues

Please report incorrectly identified User Agents and browser detect in the browscap.ini
file here: https://github.com/browscap/browscap/issues
