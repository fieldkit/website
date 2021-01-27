#!/bin/bash

set -xe

docker exec -i fieldkit-mysql mysqldump -uwordpress -pwordpress wordpress > dump.sql
