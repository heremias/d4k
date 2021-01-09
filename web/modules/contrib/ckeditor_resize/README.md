CKEDITOR RESIZE
====================

INTRODUCTION
------------

This module integrates the [resize](
https://ckeditor.com/cke4/addon/resize) CKEditor plugin for Drupal 8.

This plugin allows you to resize the classic editor instance by dragging
the resize handle (◢) located in the bottom right
(or bottom left in the Right-to-Left mode) corner of the editor.
It can be configured to make the editor resizable only in
one direction (horizontally, vertically) or in both.

REQUIREMENTS
------------

* CKEditor Module (Core)


INSTALLATION
------------

Install via Composer (recommended)

If you use Composer to manage dependencies, edit composer.json as follows.

* Run `composer require --prefer-dist composer/installers` to ensure you have
the composer/installers package. This facilitates installation into directories
other than vendor using Composer.

* In composer.json, make sure the "installer-paths" section in "extras" has an
entry for `type:drupal-library`. For example:

```json
{
  "libraries/{$name}": ["type:drupal-library"]
}
```

* Add the following to the "repositories" section of composer.json:

```json
{
  "type": "package",
  "package": {
    "name": "ckeditor/resize",
    "version": "4.13.0",
    "type": "drupal-library",
    "dist": {
      "url": "https://download.ckeditor.com/resize/releases/resize_4.13.0.zip",
      "type": "zip"
    }
  }
}
```

* Run `composer require 'ckeditor/resize:4.13.0'` to download the plugin.

* Run `composer require 'drupal/ckeditor_resize:^1.0.0'` to download the
CKEditor Resize module, and enable it [as per usual](
https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules).


 Install Manually

* Download the [resize](https://ckeditor.com/cke4/addon/resize)
CKEditor plugin.

* Extract and place the plugin contents in the following directory:
`/libraries/resize/`.

* Install the CKEditor Resize module [as per usual](
https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules).

CONFIGURATION
-------------

 * Configure the WYSIWYG buttons in
  Administration » Configuration » Content authoring » Text formats and editors:

   - Drag the resize icon button to your toolbar and save

MAINTAINERS
-----------
Current maintainers:

 * Julien de Nas de Tourris ([julien](https://www.drupal.org/u/julien))
