#!/usr/bin/env bash

# Avoid root env variables being resetted
echo 'Defaults !env_reset' >> /etc/sudoers.d/vagrant

# Set up database parameters
echo 'BEWAMO_DATABASE_HOST=localhost' >> /etc/environment
echo 'BEWAMO_DATABASE_PORT=3306' >> /etc/environment
echo 'BEWAMO_DATABASE_NAME=bewamo' >> /etc/environment
echo 'BEWAMO_DATABASE_USER=bewamo' >> /etc/environment
echo "BEWAMO_DATABASE_PASSWORD=bewamo" >> /etc/environment