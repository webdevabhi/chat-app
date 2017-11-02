# Real Time Chat Application
Real time chat-app using Angular.js, Codeigniter &amp; Ratchet


### How to use :

1) Download the code or get a clone.
if (cloning please run the command) ```sh compose install ```

2) Setup the databse named "chat_app_db" and set your usernamme and password in
```sh
	application/config/database.php
```

3) setup your base path in, as for me is http://locahost/chat-app
```sh
	application/config/config.php
```

4) Goto application/config/constants.php

Change the constant BROADCAST_URL and set it as your host.

5). Open Command Prompt Move towards your webroot folder. We are having our websocket code at following path in our project.
```sh
	server.php
	```

We have to run that server.php file from command prompt.

Just move to that folder by using "cd" command, and run the command

```sh
	php server.php
	```

6) Now open a url to migrate the databse.
URL : <http://localhost/chat-app/migrate>
(your_base_path/migrate)

7) Enter your User Name to Enter the Chat Application.


### What I used?

1) **CodeIgniter** 3.x PHP Framework (https://www.codeigniter.com/) 

2) **Ratchet** - Websocket for PHP (http://socketo.me/) by Chris Boden(@boden_c)

3) **AngularJS** - A superheroic Javascript MVW Framework by Google