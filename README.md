# PHP-performance-tester
Performance tester written in PHP

# Profiler
This app currently contains a separate package called Profiler which will be extracted into it's own repo as some point.
If you wish to run this on a system other than MacOS you will need to create a new Driver. Please see the MacOS driver  for examples.
Profiler is responsible for gathering the system information of the device the tests are running on.

## Installation
1. Install using composer - `composer create-project bluebayphil/php-performance-tester`
2. Install requirements - `composer install`

## Running
This is a command line application. You should run this by using the entry point `index.php` - `php index.php`

## Arguments
You will need to specify what tests to run. The currently available tests are:
* `loops` - For and ForEach loops
* `arrays` - Array processing
* `collections` - Eloquent collections used in the popular framework Laravel

By default, the test size is 1M (1,000,000) numbers. You can increase or decrease this by using
`--test-size=X` where X is your sample size. Setting this too high can result in an out of memory error. If this happens you can add
`ini_set('memory_limit', -1)` to the top of `index.php` to allow unrestricted memory usage. This is not recomended so use a different value to `-1`.

## Pull Requests
Pull requests for bug fixes, new tests and new Profiler drivers are always welcome.
