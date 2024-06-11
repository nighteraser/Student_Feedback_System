#!/bin/bash

des_path=/var/www/html/

echo "move all files and folders to Apache workspace..."
cp *.php $des_path
cp *.sh $des_path
cp -r . $des_path
