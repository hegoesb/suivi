#!/bin/bash

# cd /var/www/nextcloud/
# sudo -u www-data php occ files:scan --path="Edis/files/BDX_311_Pre-Etudes" Edis
ls

sudo -u www-data /usr/bin/php /var/www/nextcloud/occ files:scan --path="Edis/files/BDX_313_DOE" Edis
