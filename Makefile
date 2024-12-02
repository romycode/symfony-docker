.SILENT:

build:
	docker compose build

start:
	docker compose up -d

start/debug: stop
	env XDEBUG_MODE=debug docker compose up -d

test: start
	docker compose exec fpm env XDEBUG_MODE=coverage,debug vendor/bin/phpunit --testsuite=default

test/unit:
	docker compose exec fpm env XDEBUG_MODE=coverage,debug vendor/bin/phpunit --testsuite=Unit

test/integration:
	docker compose exec fpm env XDEBUG_MODE=coverage,debug vendor/bin/phpunit --testsuite=Integration

test/functional:
	docker compose exec fpm env XDEBUG_MODE=coverage,debug vendor/bin/phpunit --testsuite=Functional

stop:
	docker compose stop

destroy:
	docker compose down -v --remove-orphans

shell:
	docker compose exec fpm /bin/ash