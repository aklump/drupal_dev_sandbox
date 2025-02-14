<!--
id: readme
tags: ''
-->

# Developer's Coding Sandbox Drupal Module

![sandbox](../../images/sandbox.jpg)

**Only enable this module in development environments!**

## Summary

Provides a means of routing the Drupal kernel to a controller file anytime `?sb=1` is appended to the current URL. This allows you to quickly test out code in a Drupal-bootstrapped, sandbox environment. It makes for fast development.

The controller file should be located at _web/../dev_sandbox.inc_.

```text
.
└── app
    ├── dev_sandbox.inc
    └── web
```

{{ composer.install|raw }}

1. Create controller, e.g. `touch dev_sandbox.inc` in the directory above web root.
2. Add _dev\_sandbox.inc_ to _.gitignore_ as well.
3. @see `\Drupal\dev_sandbox\EventSubscriber\Sandbox::getSandboxPath` for more info.

## Usage

1. Add some code to _dev\_sandbox.inc_.

      ```php
      <?php
      print \Drupal::config('system.site')->get('name');
      ```   
1. Add `?sb=1` to the url and refresh the page; if you view source will see something like:

      ```text
      <!-- DEV SANDBOX DEBUG -->
      <!-- BEGIN OUTPUT from '/app/dev_sandbox.inc' -->
      My Project
      ```
1. To set the active theme, you should also add `theme={theme_name}` in the URL.
