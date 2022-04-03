#!/usr/sbin/setkey -f

flush;
spdflush;

add 10.0.0.1 10.0.3.2 ah 0x200 -A hmac-md5 "1234567890123456";
add 10.0.3.2 10.0.0.1 ah 0x200 -A hmac-md5 "1234567890123456";

add 10.0.0.1 10.0.3.2 esp 0x201 -E 3des-cbc "0x3ffe05014819ffff248651";
add 10.0.3.2 10.0.0.1 esp 0x201 -E 3des-cbc "0x3ffe05014819ffff248651";

spdadd 10.0.0.1/24 10.0.3.2/24 any -P out ipsec
esp/transport//require
ah/transport//require;

spdadd 10.0.3.2/24 10.0.0.1/24 any -P in ipsec
esp/transport//require
ah/transport//require;