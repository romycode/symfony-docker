# symfony docker

### configure debug with Jetbrains IDE (phpstorm & idea)

To set up the IDE with Xdebug inside the container you need to configure PHP Interpreter, follow images:

![step one](docs/step-one.png)
![step two](docs/step-two.png)
![step three](docs/step-three.png)
![step four](docs/step-four.png)
![setp five](docs/setp-five.png)
![step six](docs/step-six.png)

To be able to debug, in the request you may add a query parameter setting XDEBUG_SESSION_START to make the editor stop on
the breaking point.

Ensure to start the container with the `start/debug` command to enable Xdebug.