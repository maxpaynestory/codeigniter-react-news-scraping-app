# App that scrapes ycombinator news and show inside reactjs frontend

### Prerequisites
PHP7.0

Composer

docker

docker-compose


### Setup

Install composer libraries of server inside server folder

```
composer install
```


```
docker-compose up -d
```

After app is up and running inside docker 

### DB

Use any mysql client and connect to docker mysql db using credentials

username: root

password:(empty)

port: 3306

host: localhost


Then create database and a table

create database cuddlynest_db;

CREATE TABLE `cuddlynest_db`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `points` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `comments_total` BIGINT NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;


### Urls

frontend is running on http://localhost:3000

server is running at http://localhost:8000

