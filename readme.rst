###################
Real Time Chat Application
###################

Real time chat-app using Angular.js, Codeigniter &amp; Ratchet

*******************
How To Use
*******************

1) Download the code or get a clone.
if (cloning please run the command)  "compose install"

2) Setup the databse named "chat_app_db" and set your usernamme and password in application/config/database.php

3) setup your base path in application/config/config.php, as for me is http://locahost/chat-app

4) Goto application/config/constants.php

Change the constant BROADCAST_URL and set it as your host.

5). Open Command Prompt Move towards your webroot folder. We are having our websocket code at following path in our project.

	"server.php"
	

We have to run that server.php file from command prompt.

Just move to that folder by using "cd" command, and run the command "php server.php"

6) Now open a url to migrate the databse.
URL : <http://localhost/chat-app/migrate>
(your_base_path/migrate)

7) Enter your User Name to Enter the Chat Application.