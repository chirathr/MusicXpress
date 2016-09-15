# SocialNetwork
a social networking site using PHP and Postgres SQL as a part of Date base management system project.

# Prerequisites

$ sudo apt-get install lamp-server^
$ sudo apt-get install postgresql pgadmin3

To connect PHP to postgresql we need to install php-pqsql

$ sudo apt-get install php-pgsql

# Clone the repo

Change directory to the localhost folder
 
$ cd /var/www/html
$ git clone https://github.com/Chirath02/SocialNetwork.git

If you get permission denied error follow the below steps 

$ cd /var/www
$ sudo chown -R username:username html/

This will change the html folder owner from root and try again.