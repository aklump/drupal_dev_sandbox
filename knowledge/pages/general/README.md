<!--
id: readme
tags: ''
-->

# Dev Sandbox Drupal Module

## Summary

Define a "sandbox PHP file".  When you add `sb=1` to any URL, that file will be used as the request controller, fully bootstrapped.  Use this file to test out code in a bootstrapped environment during development.  `sb=0` will disable the sandboxed controller.

Include `theme={theme_name}` and that theme will be set as the active theme for the sandbox.  This comes in handy if you are developing a single theme.



## Installation

1. Download this module to _install/composer/dev_sandbox_.
2. Add the following to the application's _composer.json_ above web root.

    ```json
    {
      "repositories": [
        {
          "type": "path",
          "url": "install/composer/dev_sandbox"
        }
      ]
    }
    ```
3. Add `web/modules/custom/dev_sandbox` top-level _.gitignore_ (IMPORTANT! no trailing slash)!
4. Now run `composer require aklump_drupal/dev_sandbox:@dev`
5. Enable this module.

## Configuration

```php
$config['dev_sandbox.settings']['foo'] = 'bar;
```
