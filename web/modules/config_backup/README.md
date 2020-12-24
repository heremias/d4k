CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Drush
 * Troubleshooting
 * Maintainers

INTRODUCTION
------------

Config Backup module allows easy make backups of the site configurations.

* For a full description of the module, visit the project page:
  https://drupal.org/project/config_backup

* To submit bug reports and feature suggestions, or to track changes:
  https://drupal.org/project/issues/config_backup


REQUIREMENTS
------------

This module requires the following module:

 - Configuration Manager (from the Drupal core).


INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. Visit
   https://www.drupal.org/node/1897420 for further information.


CONFIGURATION
-------------

Configure the main backup directory:

Add the 'config_backup_directory' settings value to the end of settings.php file,
e.g.:
```php
$settings['config_backup_directory'] = '../config/back';
```

If needed, then add this dir to a `.gitignore` file.

Configure the user permissions in Administration » People » Permissions:

 - Backup configuration


DRUSH
-----

To run config backup via `drush` / CLI:
```
drush cbkp
```


TROUBLESHOOTING
---------------

@TODO


MAINTAINERS
-----------

Current maintainers:
 * Pavlo Tyshchenko (azovsky) - https://www.drupal.org/u/azovsky

This project has been sponsored by:
 * KNECTAR - https://www.knectar.com
