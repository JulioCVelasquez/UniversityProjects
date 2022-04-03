#!/bin/sh

route add default gw 192.168.2.1

iptables -t mangle -A OUTPUT -m owner --uid-owner 999 -j TOS --set-tos 2
iptables -t mangle -A OUTPUT -m owner --uid-owner 998 -j TOS --set-tos 4
