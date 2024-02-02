<!--
id: readme
tags: ''
-->

# Developer's Coding Sandbox Drupal Module

![sandbox](../../images/sandbox.jpg)

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
<!-- BEGIN OUTPUT from 'private://dev_sandbox.inc' -->
Here is my sandbox controller output.
```

{{ composer_install|raw }}

5. Enable this module.

## Configuration

None

## Usage

1. When you want to reroute the request to _private://dev\_sandbox.inc_ add `sb=1` to the URL.
2. To set the active theme also include `theme={theme_name}` to the URL
3. Test out code by writing it in _private://dev\_sandbox.inc_. Drupal has been
   fully bootstrapped so everything is available that you'd expect in any
   controller.
