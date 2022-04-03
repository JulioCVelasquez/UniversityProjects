#!/bin/sh

ip t add tun mode gre remote 10.0.0.1 local 10.0.3.2
ip link set  tun up 
ip -6 r add 2001::/64 dev tun
