# OXID Academy Category Logger
This package is part of the OXID Academy Training Development Basics. Please see our website for current [training offers](https://www.oxid-esales.com/ressourcen/academy/schulungen/).

## Description
This extension is an OXID eShop Module. After activation the module writes an entry to the `source/log/oxideshop.log` file on each category creation, deletion and modification. To do so it uses the event mechanism introduced with OXID eShop 6.2.

## Installation
You only need to run a single Composer command to install this extension in your OXID eShop:

```
composer require oxid-academy/category-logger
```

After installation you need to activate the module. You can do this in the administration area of your OXID eShop or via CLI by running the following command:

```
./vendor/bin/oe-console oe:module:activate  oxaccategorylogger
```

## Usage
After activation the module should work as intended. There are no extra settings in the module itself. Simply add, delete or change a category in you OXID eShop administration area. If nothing is written to log file, please see **Troubleshooting** section for possible additional configuration needed.

## Troubleshooting
If you do not see any entries in your log file, open your `config.inc.php` file located in the `source` directory of the OXID eShop and search for the `$this->sLogLevel` parameter. Default is **error**, but since the Category Logger is using the low level **info**, you need to change the parameter at least to `$this->sLogLevel = 'info';`.
