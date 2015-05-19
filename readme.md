# LittleThings PHP Developer Test

Time: 90 Minutes

Git Repository: [https://github.com/LittleThingsCom/php-developer-test](https://github.com/LittleThingsCom/php-developer-test)

## Overview

We work with data from numerous sources daily. We need to download, transform and extract data to a common interface for ease of use. Contained in the repository is an unfinished sample application that reads and writes posts to a Json store.

You'll need to implement missing methods to get the application to work and the tests to pass.

The source code is located under the `src` directory. You'll be working in the `Post.php`, `PostCollection.php` and `JsonPostRepository.php` files.

All 3 of these classes need methods implemented which are all defined in interfaces either locally or in the Standard PHP Library (SPL).

No web server is required for this test. You can run the application via `php index.php` or run the tests via `vendor/bin/phpunit` from the root of the repository.

Look inside `index.php` and the `tests` directory for guidance and when running the tests it may be easier to target individual files instead of running the entire test suite. ie. `vendor/bin/phpunit PostTest.php`

**The test will be considered complete when all the tests pass.**