#!/bin/bash

cd /var/www/nextcloud/
sudo -u www-data php occ files:scan --path='Edis/files/BDX_313_DOE' Edis
