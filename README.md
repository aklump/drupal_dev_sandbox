# Dev Sandbox Drupal Module

![sandbox](images/sandbox.jpg)

**Only enable this module in development environments!**

## Summary

Define a a file at _private://dev_sandbox.inc_. Add `sb=1` to any request query string and that file becomes the response controller. Quickly test out snippets and code ideas in a bootstrapped environment during development.

Include `theme={theme_name}` to set the active theme for the sandbox.

## Example

_private://dev_sandbox.inc_

```php
<?php
echo 'Here is my sandbox controller output.';
```

View source for: https://website.com/?sb=1&theme=claro

```text
<!-- DEV SANDBOX DEBUG -->
<!-- ACTIVE THEME is 'claro' -->
<!-- BEGIN OUTPUT from 'private://dev_sandbox.inc' -->
Here is my sandbox controller output.
```

## Install with Composer

1. Because this is an unpublished package, you must define it's repository in your project's _composer.json_ file. Add the following to _composer.json_:

    ```json
    "repositories": [
        {
            "type": "github",
            "url": "https://github.com/aklump/drupal_dev_sandbox"
        }
    ]
    ```

1. Then `composer require aklump_drupal/dev_sandbox:^0.0`    

5. Enable this module.

## Configuration

None

## Usage

1. When you want to reroute the request to _private://dev_sandbox.inc_ add `sb=1` to the URL.
2. To set the active theme also include `theme={theme_name}` to the URL
3. Test out code by writing it in _private://dev_sandbox.inc_
