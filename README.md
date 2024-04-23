# Developer's Coding Sandbox Drupal Module

![sandbox](images/sandbox.jpg)

**Only enable this module in development environments!**

## Summary

Create a file at _private://dev\_sandbox.inc_. Add `sb=1` to any request query string and now _dev\_sandbox.inc_ becomes the response controller. Quickly test out snippets and code ideas in a bootstrapped environment during development. You may also set the active sandbox theme.

## Example

_private://dev\_sandbox.inc_

```php
<?php
echo 'Here is my sandbox controller output.';
```

View source for: https://website.com/?sb=1&theme=claro

```text
<!-- DEV SANDBOX DEBUG -->
<!-- ACTIVE THEME is 'claro' -->
<!-- BEGIN OUTPUT from 'dev_sandbox.inc' -->
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

1. Then `composer require --dev aklump_drupal/dev_sandbox:^0.0`

5. Enable this module.

## Configuration

```text
.
└── app
    ├── dev_sandbox.inc
    └── web
```

1. Create _dev\_sandbox.inc_ in the directory above (in otherwords, sibling to) the web root directory. @see `\Drupal\dev_sandbox\EventSubscriber\Sandbox::getSandboxPath`
2. Do not commit _dev\_sandbox.inc_ to source control.
3. Modify the contents as desired.

## Usage

1. When you want to reroute the request to _dev\_sandbox.inc_ add `sb=1` to the URL.
2. To set the active theme also include `theme={theme_name}` in the URL.
3. Test out code by writing it in _dev\_sandbox.inc_. Drupal has been
   fully bootstrapped so everything is available that you'd expect in any
   controller.
