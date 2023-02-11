FROM certbot/certbot

ENTRYPOINT certbot --server https://acme-v02.api.letsencrypt.org/directory -d john-network.it -d *.john-network.it --rsa-key-size 4096 --manual --preferred-challenges dns-01 --email lukaspoggemann@gmail.com --agree-tos --no-eff-email --force-renewal certonly
