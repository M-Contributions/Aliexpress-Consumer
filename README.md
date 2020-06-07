# Magento AliExpress Consumer
## This extension defines Aliexpress API business rules and provides access to it

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ticaje/m2-aliexpress-consumer.svg?style=flat-square)](https://packagist.org/packages/ticaje/m2-aliexpress-consumer)
[![Quality Score](https://img.shields.io/scrutinizer/g/M-Contributions/m2-aliexpress-consumer.svg?style=flat-square)](https://scrutinizer-ci.com/g/M-Contributions/m2-aliexpress-consumer)
[![Total Downloads](https://img.shields.io/packagist/dt/ticaje/m2-aliexpress-consumer.svg?style=flat-square)](https://packagist.org/packages/ticaje/m2-aliexpress-consumer)

## Preface

This extension uses some of [Magento 2 Base Extensions](https://github.com/M-Contributions/).

I have decided to include some AE specific business policies into this extension for the sake of simplicity so Magento developers are not forced to tweak too much
on business concerns when implementing their M2 module.

We must keep in mind that AE Use Cases implementation at times turns out to be very quite messy hence the specification/exploding of
business-specific components like this one.

The most representative Use Case is posting a product to Aliexpress platform, it so happens that a series of steps must be taken when accomplishing a product post onto that platform,
please take a look at specs:

[Post Product Specs-Policies](https://developers.aliexpress.com/en/doc.htm?docId=108976&docType=1)


I must admit that this goes not in favour of other consumers outside Magento's world.

So I promise to deliver a framework agnostic middleware in charge of abstracting use cases's data preparation since it's a specific Aliexpress's Domain concern given the 
fact that this platform implements very limited policies when it comes to defining Use Cases.

The drawbacks of doing this is that a DC framework must be used in order to manage deps-orchestration since we have implemented D.I.P and Dependency Rules approach on these matters.

## Installation

You can install this package using composer(the only way i recommend)

```bash
composer require ticaje/m2-aliexpress-consumer
```

## Features

This module abstracts away the matters of passing an AE-compliant request to its API.

The consumers of this module they only have to focus on sending the proper data to this 
middleware and it will be taking care of performing request/response tasks and get back with an answer to consumers.

Two components need to be sent, __credentials__ and __data to send to AE platform__(regardless the use case).
An example will be posted here so the consumer can come to grips of how this module can be used.

## Credits

- [Héctor Luis Barrientos](https://github.com/ticaje)
- [All Contributors](../../contributors)

## License

The GNU General Public License (GPLv3). Please see [License File](LICENSE.md) for more information.
