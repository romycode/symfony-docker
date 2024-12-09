# symfony docker

### Management

To manage the project you have a Makefile with next recipes:

1. `build`: build all the docker stuff needed to run the service
1. `start`: starts the service with docker compose. `start/debug` start contianer with Xdenbug enabled.
1. `stop`: stop the services and pause docker
1. `destroy`: deletes containers and volumes for the service
1. `shell`: starts a bash shell on the fpm service container
1. `secrets/set`: add secret to the dev environment
1. `secrets/list`: list secrets for the dev environment
1. `migrate`: run migrations on the database
1. `test`: run phpunit test. You have variants to run diferents test suites. `test/unit`, `test/integration` and `test/functional` run respective suites.
1. `format`: run php-cs-fixer to follow PER-CS 2.0
1. `analyse`: use phpstan to make static code analysis

### Debug with Jetbrains IDE (phpstorm & idea)

To set up the IDE with Xdebug inside the container you need to configure PHP Interpreter, follow images:

![step one](docs/step-one.png)

> On Idea editor you need to search PHP extensions and config under Langaguages & Frameworks

![step two](docs/step-two.png)

![step three](docs/step-three.png)

![step four](docs/step-four.png)

![setp five](docs/setp-five.png)

![step six](docs/step-six.png)

To be able to debug, in the request you may add a query parameter setting XDEBUG_SESSION_START to make the editor stop on
the breaking point.

Ensure to start the container with the `start/debug` command to enable Xdebug.
