# silverstripe-shorturls

Create short URLs via Bit.ly, tagged with Google Analytics Campaign data.

[![Build Status](https://travis-ci.org/dynamic/silverstripe-shorturls.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-shorturls)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-shorturls/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-shorturls)

## Requirements

- SilverStripe ^3.2

## Installation

`composer require dynamic/silverstripe-shorturls`

In `mysite/config.yml`:

	Dynamic\ShortURL\ShortURL:
      bitly_token: 'your_token_here'

## Example usage

Use the Short URLs model admin to create campaign links, which can be used to track incoming traffic via Google Analytics.

## Documentation

See the [docs/en](docs/en/index.md) folder.
