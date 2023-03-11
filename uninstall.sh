#!/bin/bash


#######################################
# Written by Lukas Poggemann          #
#######################################


####################################### COLORS #######################################

NC='\033[0m'       # None
CC='\033[0;36m'    # Cyan
CR='\033[0;31m'    # Red
CG='\033[0;32m'    # Green

####################################### SPLASH #######################################

clear
echo ""
echo ""
echo "########################################"
echo "##          J.O.H.N.  Server          ##"
echo "##      Copyright Lukas Poggemann     ##"
echo "########################################"
echo ""

####################################### Check compatibility #######################################

echo -e "$CC \nChecking compatibility.. $NC"

os_name=$(grep 'PRETTY_NAME' /etc/os-release)

if ! [ -f "/etc/debian_version" ]; then
    echo -e "$CR \nJ.O.H.N. Server only works on Debian based systems! $NC"
    exit 1
fi

if [[ $os_name == *"Raspbian"* ]]; then
    echo -e "$CR \nJ.O.H.N. Server may not work properly on Raspberry Pi OS! $NC"
fi

echo -e "$CG \nOK. $NC"

####################################### Check root #######################################

echo -e "$CC \nChecking root.. $NC"

if [[ $EUID > 0 ]]; then
    echo -e "$CR \nThis script has to be run with root! $NC"
    exit 1
fi

echo -e "$CG \nOK. $NC"

####################################### Update & Upgrade System #######################################

echo -e "$CC \nUpdating and upgrading System.. $NC"

apt update -y
apt full-upgrade -y
apt autoremove -y

echo -e "$CG \nOK. $NC"

####################################### Install dependencies #######################################

echo -e "$CC \nInstalling dependencies.. $NC"

apt install sudo curl nano git ca-certificates apt-transport-https lsb-release gnupg -y
apt install -f

echo -e "$CG \nOK. $NC"

####################################### Set system settings #######################################

## Timedatectl
echo -e "$CC \nConfiguring Timezone $NC"
timedatectl set-timezone Europe/Berlin
echo -e "$CG \nOK. $NC"

## MOTD
echo -e "$CC \nConfiguring MOTD.. $NC"
rm -f /etc/motd
echo -e "$CG \nOK. $NC"

####################################### Install and configure Fail2Ban #######################################

echo -e "$CC \nInstalling Fail2Ban.. $NC"

apt purge fail2ban -y
rm -rf /etc/fail2ban

echo -e "$CG \nOK. $NC"

####################################### Remove old Docker files #######################################

echo -e "$CC \nPurging Docker.. $NC"

## Remove J.O.H.N.
systemctl stop john.service
systemctl disable john.service
rm -f /etc/systemd/system/john.service
systemctl daemon-reload

## Stop and remove all container
docker stop $(docker ps -a -q)
docker remove $(docker ps -a -q)

## Remove unused data
docker system prune -a -f

## Remove Docker
systemctl stop docker.socket
apt purge docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin docker-ce-rootless-extras -y

rm -rf /var/lib/docker
rm -rf /var/lib/containerd

echo -e "$CG \nOK. $NC"

####################################### J.O.H.N. installation #######################################

echo -e "$CC \nInstalling J.O.H.N. .. $NC"

rm -rf /var/john

echo -e "$CG \nOK. $NC"

####################################### J.O.H.N. service installation #######################################

echo -e "$CC \nInstalling J.O.H.N. Service.. $NC"

systemctl stop john.service
systemctl disable john.service
rm /etc/systemd/system/john.service 
systemctl daemon-reload

echo -e "$CG \nOK. $NC"

####################################### Update, Upgrade and Cleanup System #######################################

echo -e "$CC \nUpdating and upgrading System.. $NC"

apt update -y
apt upgrade -y
apt autoremove -y

echo -e "$CG \nOK. $NC"

####################################### END SPLASH #######################################

echo ""
echo ""
echo "########################################"
echo "##          J.O.H.N.  Server          ##"
echo "##       Installation completed!      ##"
echo "########################################"
echo ""
