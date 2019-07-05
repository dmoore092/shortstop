#!/bin/bash

#scp -r root@157.230.214.117:/var/www/html/backup/ .
rsync -ru root@157.230.214.117:/var/www/html/backup/backup/dbbackup .
