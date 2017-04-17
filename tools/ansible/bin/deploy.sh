#!/usr/bin/env bash

PROJECT_DIR=$(pwd)
ANSIBLE_DIR=$PROJECT_DIR/tools/ansible
PLAYBOOKS_PATH=$ANSIBLE_DIR/playbooks
INVENTORIES_PATH=$ANSIBLE_DIR/inventories
ENV=${1:-local}
GIT_BRANCH=${2:-develop}

ansible-galaxy install -f -v -r $ANSIBLE_DIR/requirements.yml -p $PLAYBOOKS_PATH/roles
ansible-playbook -i $INVENTORIES_PATH/$ENV $PLAYBOOKS_PATH/main.yml --extra-vars "git_branch=$GIT_BRANCH"