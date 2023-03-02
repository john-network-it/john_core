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

if [ -d "/var/john" ]; then
    echo -e "$CR \nJ.O.H.N. seems to be installed. This execution may brick your system! $NC"
fi

if ! [ -f "/etc/debian_version" ]; then
    echo -e "$CR \nJ.O.H.N. Server only works on Debian based systems! $NC"
    exit 1
fi

if [[ $os_name == *"Raspbian"* ]]; then
    echo -e "$CR \nJ.O.H.N. Server may not work properly on Raspberry Pi OS! $NC"
fi

echo -e "$CG \nOK. $NC"

####################################### Check internet #######################################

echo -e "$CC \nChecking internet connection.. $NC"

if [[ "$(ping -c 1 8.8.8.8 | grep '100% packet loss' )" != "" ]]; then
  echo -e "$CR \nJ.O.H.N. Server needs an active internet connection for the installation! $NC"
  exit 1
fi

echo -e "$CG \nOK. $NC"

####################################### Check root #######################################

echo -e "$CC \nChecking root.. $NC"

if [[ $EUID > 0 ]]; then
    echo -e "$CR \nThis script has to be run with root! $NC"
    exit 1
fi

echo -e "$CG \nOK. $NC"

####################################### Install dependencies #######################################

echo -e "$CC \nInstalling dependencies.. $NC"

apt install sudo curl nano git ca-certificates apt-transport-https lsb-release gnupg -y
apt install -f

echo -e "$CG \nOK. $NC"

####################################### Purge & Update #######################################

echo -e "$CC \nPurging and updating.. $NC"

systemctl stop john
rm -rf /var/john
git clone https://github.com/john-network-it/john_core.git
mkdir -p /var/john/
cp -R john_core/docker/webapp/src/* /var/john/
systemctl start john

####################################### Remove tmp #######################################

echo -e "$CC \nRemove temp files.. $NC"

rm -rf john_core

####################################### END SPLASH #######################################

echo ""
echo ""
echo "########################################"
echo "##          J.O.H.N.  Server          ##"
echo "##      WebApp Update completed!      ##"
echo "########################################"
echo ""

