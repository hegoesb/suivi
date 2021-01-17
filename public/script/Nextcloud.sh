#!/bin/bash

cd /var/www/nextcloud/
sudo -u www-data php occ files:scan --path='Edis/files/BDX_331_Chantiers/EBX_PJ2012-0010_Heris_Moles/22_Plans_EDIS' Edis
