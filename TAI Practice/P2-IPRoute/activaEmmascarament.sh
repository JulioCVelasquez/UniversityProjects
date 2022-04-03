#!/bin/sh

echo 1 > /proc/sys/net/ipv4/ip_forward

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.33/27 

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.65/27 

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.97/27

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.129/27

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.161/27

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.193/27 

iptables -t nat -A POSTROUTING -j MASQUERADE -s 192.168.2.225/27 

ip address add 192.168.1.2/24 broadcast 192.168.1.255 dev eth1

ip address add 192.168.0.2/24 broadcast 192.168.0.255 dev eth0

ip route add default scope global nexthop via 192.168.0.1 dev eth0 weight 5 nexthop via 192.168.1.1 dev eth1 weight 5

