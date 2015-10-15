# WP Starter Environment

The local development environment uses [Station](https://github.com/mcuyar/station) which is a simple, module based framework for customizing the [laravel/homestead](https://github.com/laravel/homestead) vagrant environment.

Station extends homesteads Yaml configuration file with features such as: XDebug, zsh, oh-my-zsh, ruby-gem installers and much more.

To learn more about how to use Station, lots of information is available in the [wiki](https://github.com/mcuyar/station/wiki).

##Setting up your local environment

1. Install requirements
	* Git: Version control manager [download](http://git-scm.com/download).
	* Newest version of VirtualBox [download](https://www.virtualbox.org/wiki/Downloads).
	* Virtualbox Extension Pack: located on VirtualBox downloads page.
	* Newest Vagrant build: Manages the virtual machine through virtual box [download](https://www.vagrantup.com/downloads.html).

2. Set up Git: All this happens in terminal
	* open terminal and type these commands
	* Add your name: `git config --global user.name "Your Name Here"`
	* Add your email: `git config --global user.email "your_email@example.com"`
	* Add colors: `git config --global color.ui auto`

3. Setup your Github/Bitbucket account
	* Create a github account at github.com if you haven't already.
	* Create a Bitbucket account as well
	* Follow [this](https://help.github.com/articles/generating-ssh-keys) guide for setting up ssh keys on your machine.

##Host Editor

The dev server is set up to point to a specific domain at a custom ip address. We need to edit your machines hosts file.

The best way that I've found to do this is to install a browser plugin for either chrome or firefox called HostAdmin.

1. Install HostAdmin
	* Firefox: https://addons.mozilla.org/En-us/firefox/addon/hostadmin/
	* Chrome: https://chrome.google.com/webstore/detail/hostadmin/oklkidkfohahankieehkeenbillligdn?hl=en-US

2. Add correct permissions. In terminal (linux/OSX) type: `sudo chmod og+w /etc/hosts`.

3. Click on the host editor and add the following entry: `192.168.10.55 local.wp-starter.com`.

4. Save and you're done.

##Clone the application repository to your machine

> Some of these instructions are based on my preferences, please feel free to change them if your environment is different.

1. Next clone the app repository to a folder on your machine.
    * create a sites directory in your user folder: `mkdir -p ~/Sites`
	* In terminal type: `git clone git@github.com:mcuyar/wp-starter.git ~/Sites/wp-starter`.

##Start up the development box

1. In terminal, navigate to the application folder `cd ~/Sites/wp-starter` (you may already be there).

2. Start the the virtual machine `vagrant up`.

3. If this is not the first time you have ran the `vagrant up` for the app, provision the box by running the command `vagrant provision` after the vm is up and running.

> If for any reason you come across the NFS error below, complete the following instructions to correct the issue.

`NFS is reporting that your exports file is invalid. Vagrant does`
`this check before making any changes to the file. Please correct`
`the issues below and execute "vagrant reload":`

`exports:2: path contains non-directory or non-existent components: <path-to-wp-starter-environment>`
`exports:2: no usable directories in export entry`
`exports:2: using fallback (marked offline): /`

1. Open the exports file located at /etc/exports and clear out all the available entries and save the file. If this does not work or you do not have access to modify the file, continue to the next step b.
2. Open up terminal and run the following command to open the export file: `sudo nano /etc/exports`.
3. Go ahead and clear out all the entries within the file. Note: you can clear each line quickly by hitting `control+k` for each line within the exports file.
4. Save the `exports` file by using the key combinations of `control+x` followed by `y`, then `enter` to save your changes.
5. You will likely need to restart the Vagrant VM by running `vagrant halt` followed by `vagrant up`, once again.

> A typical reason for this error to occur is if you renamed the environment directory after the initial `vagrant up`.

##Final set up for the app

1. Still within the `~/Sites/wp-starter` directory SSH into the Vagrant box by running `vagrant ssh`.

2. Change your current directory to `cd /var/www`.

3. Run the command: `composer install`

4. Navigate to local.wp-starter.com in your favorite browser and install wordpress

##Notes and troubleshooting

If you ever run into any issues with the server, try restarting nginx and php

1. SSH into the Vagrant box: `vagrant ssh`.

2. Run the command: `sudo service nginx restart && sudo service php5-fpm restart`.

##Customizing your Dev environment (optional|advanced)

This file will allow you to customize your development environment. You can open this in your favorite text editor. As a quick reference, you can open the current folder in Finder by typing `open .` in terminal.

1. In terminal navigate to your development folder `cd ~/Sites/wp-starter` on your host machine.

2. Create a new file called config.yaml: `touch config.yaml`.

3. Open up the new config.yaml file either with the text editor of your choice or with nano: `sudo nano config.yaml`. You may be required to enter your user account password.

4. Copy/paste any config changes you need to make from the config-default.yaml file.

6. Save the `config.yaml` file. If you are using nano, hit `control+x` followed by `y`, then `enter` to save your changes.