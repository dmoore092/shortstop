#update packages
apt-get update
apt-get upgrade

#install git
apt-get install -y git

#Apache2
apt-get install -y apache2
a2enmod rewrite

# #add php repo
sudo apt-get install software-properties-common
apt-add-repository ppa:ondrej/php
apt-get update

# #install php
apt-get install -y php7.3
apt-get install -y php7.3-common
apt-get install -y php7.3-mcrypt
apt-get install -y php7.3-zip
apt-get install -y libapache2-mod-php7.3
apt-get install -y php7.3-dom

#set mysql pass
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

#install mysql
apt-get install -y mysql-server
apt-get install -y php7.3-mysql

#restart apache
service apache2 restart
