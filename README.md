# Cuddlynest YCombinator news app

### Prerequisites
PHP7.0
Composer
docker
docker compose


### Setup

To install backend app dependencies

```
composer install
```

```
docker up -d
```

After app is up and running inside docker containers

use

```
docker ps
```

Use the mysql container pid to ssh to the machine and create database

```
docker exec -it db45ad5bc522 bash
```

Once you are inside mysql container connect to mysql and create database

```
mysql -u root -p
```

Press enter as root password is empty. Then

```
create database cuddlynest_db;
CREATE TABLE `cuddlynest_db`.`news` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `points` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `comments_total` BIGINT NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;
```

exit the container, and run migrations available inside backend app



