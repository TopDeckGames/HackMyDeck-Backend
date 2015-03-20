HackMyDeck - Backend
=======

Installation
----------------
1. Open command line and install the dependencies :

```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install

2. Configure the database :

```bash
cp config.yml.dist config.yml
vim config.yml
# Or edit it with your favorite editor

3. Generating tables and :

```php
php console orm:schema-tool:create
php console user:add
# Follow the instructions

4. Change the permissions for : var/cache & var/logs

```bash
chmod 755 var/cache var/logs

Documentation
----------------

[Silex](http://silex.sensiolabs.org) - Silex framework website

[Documentation](http://silex.sensiolabs.org/documentation) - Developers Documentation Silex

[The Cookbook](http://symfony.com/) - Tips, tutorials and news about Symfony