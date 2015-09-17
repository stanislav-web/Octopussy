# Octopussy

[![Codeship Build Code](https://codeship.com/projects/f1a63ed0-3397-0133-8c3a-32e25a7c007a/status?branch=master)](https://codeship.com/projects/f1a63ed0-3397-0133-8c3a-32e25a7c007a/status?branch=master)

### _(currently under development)_

Octopussy is the site visitors grabber. Build in Phalcon & MongoDb

## ChangeLog

## Compatible

## System requirements

* PHP 5.6.x
* MongoDB

## Install
1. Config.

// Sonar task configuration
            'sonar' =>  [
                'logfile'  =>   APP_PATH.'/../logs/octopussy-event.log',
                'socket'        =>  [
                    'host'  =>  '127.0.0.1',
                    'port'  =>  9001,
                ],
                'storage'       =>  [
                    'host'      =>  '127.0.0.1',
                    'port'      =>  27017,
                    'user'      =>  'root',
                    'password'  =>  'root',
                    'dbname'    =>  'octopussy',
                ]
            ]

2. Add task to cli.php registerNamespaces

        DOCUMENT_ROOT.'vendor/stanislav-web/octopussy/src/Octopussy/System/Tasks'

            // init configurations // init logger
            $this->setConfig($this->getDI()->get('config'))->setLogger();

            // run server
            $this->sonar = new Application($this->getConfig());

            $this->sonar->run();
            
## Usage

##[Issues](https://github.com/stanislav-web/octopussy/issues "Issues")