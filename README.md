# Test Dafiti

## Note
***This project is a test to apply for a job. Somethings are taken for granted***

### Description
Build a product's CRUD.

### Get and install the project

*The project runs into a docker container, I assume that you have it.*

1. Download project from github:
```bash
$ git clone https://github.com/geonunez/test-dafiti <folder>
```
2. Build and run containers:
```bash
$ cd <folder>
$ docker-compose build
$ docker-composer up -d
```
3. Enter into web container:
```bash
$ docker exec -i -t test-dafiti-web bash
```
4. Run the project as developer
```bash
$ composer install --no-interaction
$ bin/console assets:install
$ bin/console assetic:dump
$ bin/console doctrine:migration:migrate --no-interaction
$ bin/console server:start
```
