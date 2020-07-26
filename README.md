# Web Crawler

_App to consume webpage, scrape it and return json array with all the product options on the pages_

## Comenzando

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisites

_Install PHP 7.3_

*[How to install PHP 7.3 on Ubuntu 18.04](https://www.cloudbooklet.com/how-to-install-php-7-3-on-ubuntu-18-04/)

_Install Make (for executing other commands). See Makefile file for usages_

```
sudo apt-get install build-essential
```

### Installation

_Install composer_

Following the official instructions for downloading and installing Composer, copy and paste this command into the CLI:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');"
```

_You may run the following command to move Composer into your global path:_

```
sudo mv composer.phar /usr/local/bin/composer
```

_Execute composer on project folder_

```
composer install
```

_After all downloads, try executing PHPUnit by running (the first time you run this, it will download PHPUnit itself and make its classes available in your app):_

```
.php /bin/phpunit
```

## Testing

 _How to test?_

_Testing for Helper functions_

```
php bin/phpunit tests/Helper/CommandHelperTest.php
```

### Analice las pruebas end-to-end

_Explica que verifican estas pruebas y por qué_

```
Da un ejemplo
```

### Y las pruebas de estilo de codificación

_Explica que verifican estas pruebas y por qué_

```
Da un ejemplo
```

## Despliegue

_Agrega notas adicionales sobre como hacer deploy_

## Made with

* [Symfony](http://www.symfony.com/)
* [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

## Authors

* **Igor Morillo** - [imorillo](https://github.com/igormorillo)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) quíenes han participado en este proyecto. 

## Licencia

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

---