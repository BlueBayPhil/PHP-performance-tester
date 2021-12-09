# PHP-performance-tester
Performance tester written in PHP

# Profiler
This app currently contains a separate package called Profiler which will be extracted into it's own repo as some point.
If you wish to run this on a system other than MacOS you will need to create a new Driver. Please see the MacOS driver  for examples.
Profiler is responsible for gathering the system information of the device the tests are running on.

## Installation
1. Clone this repository
2. Install requirements - `composer install`

## Running
This is a command line application. You should run this by using the entry point `index.php` - `php index.php`

## Arguments
You will need to specify what tests to run. The currently available tests are:
* `loops` - For and ForEach loops
* `arrays` - Array processing
* `collections` - Eloquent collections used in the popular framework Laravel

If no tests are specified, all tests are run.

By default, the test size is 1M (1,000,000) numbers. You can increase or decrease this by using
`--data-size=X` where X is your sample size. Setting this too high can result in an out of memory error. If this happens you can add
`ini_set('memory_limit', -1)` to the top of `index.php` to allow unrestricted memory usage. This is not recomended so use a different value to `-1`.

## Example
### Command
`php index.php loops arrays collections --data-size=15000000`

### Result
```
Test Environment:
Operating System	:	MacOS -  macOS 11.2.3 (20D91)
CPU             	:	Dual-Core Intel Core i5 - 2.3 GHz
Memory          	:	8 GB

Test data sample size: 1000000
Running Test Profile: loops
testForeachLoopPrepared	:	0.053490877151489
testForLoopCounted     	:	0.075989007949829
testForLoop            	:	0.11839604377747
testForeachLoop        	:	0.15424990653992


Running Test Profile: arrays
testVariableFunction 	:	0.07072901725769
testAnonymousFunction	:	0.073591947555542
testDefinedFunction  	:	0.074967861175537


Running Test Profile: collections
testAnonymousFunction	:	0.14022707939148
testVariableFunction 	:	0.14190816879272
testDefinedFunction  	:	0.1811637878418
```

## Pull Requests
Pull requests for bug fixes, new tests and new Profiler drivers are always welcome.
