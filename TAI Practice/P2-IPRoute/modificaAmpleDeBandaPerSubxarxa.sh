#!/bin/sh

ip route add $1 src 192.168.2.1 dev eth2 realm 1

tc filter add dev eth0 parent 1: protocol ip prio 1 route from 1 flowid 1:$2

tc filter add dev eth1 parent 1: protocol ip prio 1 route from 1 flowid 1:$2