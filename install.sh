#!/bin/bash

#######################################
# Written by Lukas Poggemann          #
#######################################




####################################### COLORS #######################################
NC='\033[0m'       # None
CC='\033[0;36m'    # Cyan
CR='\033[0;31m'    # Red

####################################### SPLASH #######################################
clear
echo "########################################"
echo "##          J.O.H.N.  Server          ##"
echo "##      Copyright Lukas Poggemann     ##"
echo "########################################"
echo ""

####################################### Check compatibility #######################################

os_name=$(grep 'PRETTY_NAME' /etc/os-release)

if ! [ -f "/etc/debian_version" ]; then
    echo -e "$CR \nJ.O.H.N. Server only works on Debian based systems! $NC"
    exit 1
fi

if [[ $os_name == *"Raspbian"* ]]; then
    echo -e "$CR \nJ.O.H.N. Server may not work properly on Raspberry Pi OS! $NC"
fi

####################################### Check root #######################################
if [[ $EUID > 0 ]]; then
    echo -e "$CR \nThis script has to be run with root! $NC"
    exit 1
fi

####################################### Update & Upgrade System #######################################
echo -e "$CC \nUpdating and upgrading System.. $NC"

apt update -y
apt full-upgrade -y
apt autoremove -y

####################################### Install dependencies #######################################
echo -e "$CC \nInstalling dependencies $NC"

apt install sudo curl nano git ca-certificates apt-transport-https lsb-release gnupg -y
apt install -f

####################################### Set system settings #######################################
echo -e "$CC \nChanging system settings $NC"

## Timedatectl
echo -e "$CC \nSet time and date $NC"
timedatectl set-timezone Europe/Berlin

## MOTD
echo -e "$CR \nSet MOTD $NC"
rm -f /etc/motd
cp configs/server/motd/motd /etc/motd

####################################### Install and configure Fail2Ban #######################################
echo -e "$CC \nInstalling Fail2ban $NC"

apt purge fail2ban -y
rm -rf /etc/fail2ban

apt install fail2ban -y
cp configs/software/fail2ban/jail.local /etc/fail2ban/jail.local
systemctl restart fail2ban

####################################### Remove old Docker files #######################################
echo -e "$CC \nRemoving old Docker files $NC"

apt purge docker-ce docker-ce-cli containerd.io docker-compose-plugin -y
rm -rf /var/lib/docker
rm -rf /var/lib/containerd

####################################### Install Docker #######################################
echo -e "$CC \nInstalling Docker $NC"

if [[ $os_name == *"Debian"* ]]; then
    ## Keyring
    mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg

    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
      $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null

    apt update

    ## Main installation
    apt install docker-ce docker-ce-cli containerd.io docker-compose-plugin -y
else
    curl -fsSL https://get.docker.com -o get-docker.sh
    bash ./get-docker.sh --dry-run
    rm ./get-docker.sh -f
fi
####################################### Portainer installation #######################################
echo -e "$CC \nInstalling Portainer $NC"

docker stop portainer
docker rm portainer

docker volume create portainer_data
docker run -d -p 8000:8000 -p 9443:9443 --name portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ce:latest

####################################### J.O.H.N. service installation #######################################
echo -e "$CC \nInstalling J.O.H.N. Service $NC"

systemctl stop john.service
systemctl disable john.service
rm -f /etc/systemd/system/john.service
systemctl daemon-reload

cp configs/server/systemd/john.service /etc/systemd/system/john.service 
systemctl daemon-reload
systemctl enable john.service
systemctl start john.service

####################################### J.O.H.N. installation #######################################
echo -e "$CC \nInstalling J.O.H.N. $NC"

rm -rf /var/john

mkdir -p /var/john/
cp -R docker/* /var/john/

####################################### Update, Upgrade and Cleanup System #######################################
echo -e "$CC \nUpdating, Upgrading and Cleaning System.. $NC"

apt update -y
apt full-upgrade -y
apt autoremove -y

####################################### END SPLASH #######################################
echo ""
echo ""
echo "########################################"
echo "##          J.O.H.N.  Server          ##"
echo "##       Installation completed!      ##"
echo "########################################"
echo ""
