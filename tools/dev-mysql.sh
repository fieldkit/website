#!/bin/bash

set -xe

docker exec -i fieldkit-mysql mysql -uwordpress -pwordpress wordpress -e "select * from wp_options where option_value like '%fkdev%'" > options.txt

docker exec -it fieldkit-mysql mysql -uwordpress -pwordpress wordpress
