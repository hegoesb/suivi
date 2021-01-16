#!/bin/bash

cd /var/www/nextcloud/
sudo -u www-data php occ files:scan --path='Edis/files/BDX_312_Etudes-Chantiers' Edis
