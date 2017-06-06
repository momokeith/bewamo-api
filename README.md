# bewamo-api

## Setting up the local environment
````
git clone https://github.com/momokeith/bewamo-api.git
git checkout develop
cd tools/vagrant
vagrant up --provision
````

## Deploying on staging
````
tools/ansible/bin/deploy.sh
````