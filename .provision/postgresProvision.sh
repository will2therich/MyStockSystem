#!/usr/bin/env bash

apt-get install wget ca-certificates
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -
sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt/ `lsb_release -cs`-pgdg main" >> /etc/apt/sources.list.d/pgdg.list'
apt-get update
sudo apt-get install postgresql postgresql-contrib -y
sudo apt-get install pwgen -y
randomPassword="$(pwgen 13 1)"
sudo -u postgres psql -c "CREATE USER laraveluser WITH PASSWORD '${randomPassword}' superuser CREATEDB;"
sudo -u postgres psql -c "CREATE DATABASE laravel"
sudo -u postgres psql -c "grant all privileges on database laravel to laraveluser"
sed -i "s/SET_DB_PASSWORD/${randomPassword}/g" /vagrant/src/api/.env
php /vagrant/src/api/artisan migrate:fresh
