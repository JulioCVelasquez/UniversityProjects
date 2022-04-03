#!/bin/sh

tc qdisc add dev eth0 parent 1:8 handle 80: pfifo

tc qdisc add dev eth1 parent 1:8 handle 80: pfifo

ip route add 192.168.2.1 dev eth2 realm 8

tc filter add dev eth0 parent 1: protocol ip prio 1 route from 8 flowid 1:8

tc filter add dev eth1 parent 1: protocol ip prio 1 route from 8 flowid 1:8



