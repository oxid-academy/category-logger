# OXID Academy Category Logger
**This Package is part of the OXID Academy Development Basic Training.**

## Installation
```
composer require oxid-academy/category-logger
```

## Description
This OXID eShop module writes an entry to the `source/log/oxideshop.log` file on every category creation, deletion and modification. It uses the event mechanism introduced with OXID eShop 6.2.

## Troubleshooting
If you don't see any entries in your log, open your `config.inc.php` file located in the `source` directory of the OXID eShop and search for the `$this->sLogLevel` parameter. Default is *error*, but since the Category Logger is using the low level *info*, you have to change the parameter at least to `$this->sLogLevel = 'info';`
