#!/usr/bin/env bash

PROJECT_DIR=$(pwd)
ANSIBLE_DIR=$PROJECT_DIR/tools/ansible
PLAYBOOKS_PATH=$ANSIBLE_DIR/playbooks
INVENTORIES_PATH=$ANSIBLE_DIR/inventories

ansible-galaxy install -f -v -r $ANSIBLE_DIR/requirements.yml -p $PLAYBOOKS_PATH/roles
ansible-playbook -i $INVENTORIES_PATH/$1 $PLAYBOOKS_PATH/main.yml -vvv