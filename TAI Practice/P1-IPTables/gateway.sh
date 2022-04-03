#!/bin/sh

echo 1 > /proc/sys/net/ipv4/ip_forward

iptables -t nat -A POSTROUTING -o eth1 -j MASQUERADE

iptables -t filter -A FORWARD -m tos --tos 2 -j LOG --log-level info --log-prefix "User1:"
iptables -t filter -A FORWARD -m tos --tos 4 -j LOG --log-level info --log-prefix "User2:"

iptables -t filter -A FORWARD -m tos --tos 2 -j ACCEPT
iptables -t filter -A FORWARD -m tos --tos 4 -j DROP

service rsyslog start
cd /var/log
touch gateway.log
cd /etc/rsyslog.d
touch gateway.conf
echo ':msg, contains, "User" /var/log/gateway.log' >> gateway.conf
echo "&~" >> gateway.conf
service rsyslog restart

