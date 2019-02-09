# Silverstripe Short URLs

Create short URLs via Bit.ly, tagged with Google Analytics Campaign data.

[![Build Status](https://travis-ci.org/dynamic/silverstripe-shorturls.svg?branch=master)](https://travis-ci.org/dynamic/silverstripe-shorturls)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamic/silverstripe-shorturls/build-status/master)
[![codecov](https://codecov.io/gh/dynamic/silverstripe-shorturls/branch/master/graph/badge.svg)](https://codecov.io/gh/dynamic/silverstripe-shorturls)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-shorturls/v/stable)](https://packagist.org/packages/dynamic/silverstripe-shorturls)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-shorturls/downloads)](https://packagist.org/packages/dynamic/silverstripe-shorturls)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-shorturls/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-shorturls)
[![License](https://poser.pugx.org/dynamic/silverstripe-shorturls/license)](https://packagist.org/packages/dynamic/silverstripe-shorturls)

## Requirements

- SilverStripe ^4.2

## Installation

`composer require dynamic/silverstripe-shorturls`

Create the file `app/myshorturlconfig.yml`:

	---
    Name: myshorturlconfig
    After: 'shorturlconfig'
    ---
    Dynamic\ShortURL\Model\ShortURL:
      bitly_token: 'your_token_here'

## Example usage

Use the Short URLs model admin to create campaign links, which can be used to track incoming traffic via Google Analytics.
