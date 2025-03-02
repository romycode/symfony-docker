.SILENT:

export COMPOSE_BAKE = true
export COMPOSE_PROJECT_NAME = symfony-docker

COMPOSE = docker compose -f resources/compose.yaml -f resources/compose.local.yaml

build:
	$(COMPOSE) build

start:
	$(COMPOSE) up -d

start/debug: stop
	env XDEBUG_MODE=debug $(COMPOSE) up -d

stop:
	$(COMPOSE) stop

up:
	$(COMPOSE) up -d --remove-orphans

down:
	$(COMPOSE) down -v --remove-orphans

bash:
	$(COMPOSE) exec fpm /bin/bash

zsh:
	$(COMPOSE) exec fpm /bin/zsh

NAME = ""
VALUE = ""
secrets/set:
	$(COMPOSE) exec fpm /bin/bash -c "echo -n $(VALUE) | bin/console secrets:set $(NAME) -"

secrets/list:
	$(COMPOSE) exec fpm bin/console secrets:list --reveal

migrate:
	$(COMPOSE) exec fpm bin/console d:m:m --allow-no-migration --all-or-nothing --no-interaction

test:
	$(COMPOSE) exec fpm env XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite=default

test/unit:
	$(COMPOSE) exec fpm env XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite=Unit

test/integration:
	$(COMPOSE) exec fpm env XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite=Integration

test/functional:
	$(COMPOSE) exec fpm env XDEBUG_MODE=coverage vendor/bin/phpunit --testsuite=Functional

format:
	$(COMPOSE) exec fpm php-cs-fixer fix --config="resources/.php-cs-fixer.php"

analyse:
	$(COMPOSE) exec fpm vendor/bin/phpstan analyse -c resources/phpstan.dist.neon src tests
