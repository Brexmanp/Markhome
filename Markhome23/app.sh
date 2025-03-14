# to exec the app:
# touch app.sh
# nano app.sh
# copy this file into app.sh
# chmod +x app.sh
# sudo bash ./app.sh
# then connects to:80

#!/bin/bash
sudo apt update
sudo apt install -y apache2
sudo ufw allow in "Apache"
sudo apt install -y mysql-server
sudo apt install -y php libapache2-mod-php php-mysql
sudo mkdir /var/www/localhost
sudo chown -R $USER:$USER /var/www/localhost
sudo cat << EOF > /etc/apache2/sites-available/localhost.conf
<VirtualHost 127.0.0.1:80>
    ServerName localhost
    ServerAlias localhost
    ServerAdmin localhost
    DocumentRoot /var/www/html
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
sudo a2ensite localhost
sudo a2dissite localhost
sudo apache2ctl configtest
sudo systemctl reload apache2
touch /var/www/html/index.html
<html>
<head>
    <title>localhost website</title>
</head>
<body>
    <h1>Hello World!</h1>
    <p>This is the landing page of <strong>localhost</strong>.</p>
</body>
</html>
EOF

