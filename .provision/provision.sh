#!/bin/bash

# Provisions the Vagrant VM for this project. This file should never be
# executed manually. It is intended to be run only in the context of the
# `vagrant up` execution.

# NOTE: This script is executed by Vagrant as the root user.

set -e

#
# PREPARE THE BOX
# General updates that need to be made to the box for this application.
#

# Set a helpful hostname as a convenient reference.
echo "Setting hostname..."
echo "${1:git-project-name}" > /etc/hostname
echo "127.0.0.1 ${1}" >> /etc/hosts
hostname ${1}
echo "Complete."

echo "Updating installed packages..."
apt-get upgrade -qq -y
apt-get update -qq -y
echo "Complete."
