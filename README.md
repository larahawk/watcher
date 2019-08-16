# Larahawk Watcher

[![Current Version](https://img.shields.io/packagist/v/larahawk/watcher.svg?style=flat-square)](https://packagist.org/packages/larahawk/watcher)
[![Build Status](https://img.shields.io/travis/larahawk/watcher/master.svg?style=flat-square)](https://travis-ci.org/larahawk/watcher)

This watcher package listens for exceptions and log events from your Laravel application and reports them back to your Larahawk account.

## Features

- Automatically reports unhandled exceptions
- Reports helpful log events by default
- Attaches user, browser, and OS information to each event

## Installation

1. Create a Larahawk account
2. Install this package using `composer require larahawk/watcher`
3. Add your project's API key to the application's `.env` file
4. Make any desired adjustments to the watcher using the package's config file

## Contributing and Support

Feel free to [submit any issues](https://github.com/larahawk/watcher/issues/new) you might have with this package, but please search through [previously-added ones](https://github.com/larahawk/watcher/issues) first. All contributions are welcome!

## License

The MIT License (MIT). See [LICENSE.md](https://github.com/larahawk/watcher/blob/master/LICENSE.md) for more details.