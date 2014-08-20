cakefest2014
============

###Setting up a minimal development environment
* check requirements here http://book.cakephp.org/3.0/en/installation.html

####Using Microsoft Azure VM
* login to https://manage.windowsazure.com
* spawn a new virtual machine using New > Compute > Virtual Machine > From Gallery
* next, pick ubuntu 14.04
* next, pick a name, and check "select a password", type a username and password
* next, select West or North Europe region, Add 1 Endpoint > add a new one HTTP public: 80 private: 8080
* next, OK and wait
* ssh to the virtual machine, use either the public IP or the name-of-the-vm.cloudapp.net
* curl -L https://gist.github.com/steinkel/bde2b3b8e792f308c8b7/raw/eee38f6aff865f7cb73fd645bf33283870acfaae/init.sh |bash
* point your browser to name-of-the-vm.cloudapp.net

####Using Vagrant
* use your preferred Ubuntu 14 box
* Setup port forwarding in Vagrantfile: config.vm.network :forwarded_port, guest: 8080, host: 8080
* vagrant up && vagrant ssh
* curl -L https://gist.github.com/steinkel/bde2b3b8e792f308c8b7/raw/eee38f6aff865f7cb73fd645bf33283870acfaae/init.sh |bash
* point your browser to http://localhost:8080
