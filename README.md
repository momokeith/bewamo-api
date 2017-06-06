# bewamo-api


## Setting up the local environment

### Requirements
````
ansible >= 2.2.3.0
Vagrant >= 1.9.5
VirtualBox >= 5.1.22 r115126
````
### Steps
````
git clone https://github.com/momokeith/bewamo-api.git
cd bewamo-api
git checkout develop
cd tools/vagrant
vagrant up --provision
````

## Deploying on staging
````
tools/ansible/bin/deploy.sh
````