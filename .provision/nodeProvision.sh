#!/usr/bin/env bash

apt-get install curl
curl -sL https://deb.nodesource.com/setup_13.x | sudo -E bash -
sudo apt-get install nodejs -y
npm install -g @vue/cli
