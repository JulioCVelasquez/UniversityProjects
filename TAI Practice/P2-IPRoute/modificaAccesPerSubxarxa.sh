#!/bin/sh

iptables -t filter -A FORWARD -s $1 -j $2

