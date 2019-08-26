<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic REST API Implementation</h1>
    <br>
</p>

This is simple implementation of Yii2 Basic Template for API/Backend Application.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      customs/            contains custom classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

No need to worry about installation, just clone this repo. All dependencies should be downloaded too.

CONFIGURATION
-------------

### Database

Import file `pretest_privy.sql` to create database scheme including some data seed

**NOTES:**
- This file contains `CREATE DATABASE` command, so you don't need to create blank database
- Please do check `runtime` and `web` directory, it should be writable

### REST Client

Import file `Pretest-Privy.postman_collection.json` for API Collection & `Pretest-Privy.postman_environment.json` for the environment. You can import those file using Postman or Insomnia.

RUNNING APPLICATION
-------------------

### Create Server

Simply run this command from your console `php yii serve --port=7878`, so you can access it by calling `http://localhost:7878`.
You can change the port, but you have to change the REST Client environment settings too.

<img src="https://raw.githubusercontent.com/amculin/yii2-basic-rest-api/develop/readme-source/running-yii-application.jpg" />

### Testing via Insomnia

<img src="https://raw.githubusercontent.com/amculin/yii2-basic-rest-api/develop/readme-source/api-collection-insomnia.jpg" />

### Testing via Postman

<img src="https://raw.githubusercontent.com/amculin/yii2-basic-rest-api/develop/readme-source/api-collection-postman.jpg" />
