#!/bin/sh
set -e
domain=$(kubectl get ingress -A -o custom-columns=HOSTS:.spec.rules[0].host | tail -n +2 | sort | uniq | xargs | sed  's/ /, /g')
ip=$(kubectl get node -o custom-columns=IP:.status.addresses[0].address -l node-role.kubernetes.io/worker=true | tail -n +2 | sed -e 's/$/:80/' | tr '\n' ' ')
cp /etc/caddy/k8s.conf.template /etc/caddy/k8s.conf
sed -i -e "s/<DOMAIN_LIST>/$domain/g" /etc/caddy/k8s.conf
sed -i -e "s/<IP_LIST>/$ip/g" /etc/caddy/k8s.conf
cd /etc/caddy
caddy reload
echo "OK"
