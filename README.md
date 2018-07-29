# unframework
[![Build Status](https://travis-ci.org/matthewbdaly/unframework.svg?branch=master)](https://travis-ci.org/matthewbdaly/unframework)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/unframework/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/unframework?branch=master)
Unframework is not a framework. It's an opinionated collection of off-the-shelf PHP components and some very basic glue to stick them together for cases where you don't want to use a full framework.

It's also a learning experience in how to build a small framework from scratch. It doesn't contain everything you need, just the basics such as:

* Twig templating
* Caching
* Doctrine ORM
* Logging
* Routing
* Session support
* A basic interactive shell

Installation
------------

```bash
composer create-project --prefer-dist matthewbdaly/unframework myapp
```
