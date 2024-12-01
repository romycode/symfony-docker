.SILENT:


build:
	docker compose build

start:
	docker compose up -d

start/debug: stop
	env XDEBUG_MODE=debug docker compose up -d

stop:
	docker compose stop

destroy:
	docker compose down -v --remove-orphans

shell:
	docker compose exec fpm /bin/ash