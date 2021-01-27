#!/bin/bash

set -xe

if [ -f "$1" ]; then
	docker exec -i fieldkit-mysql mysql -uwordpress -pwordpress wordpress < $1
else
	echo "usage: $0 <sql-dump>" 
fi
