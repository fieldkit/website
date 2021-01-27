#!/bin/bash

set -xe

docker exec -i fieldkit-mysql mysql -uwordpress -pwordpress wordpress <<EOF

update wp_options set option_value = 'http://www.fieldkit.test/' where option_name in ('siteurl', 'home');

# Necessary because missing dependencies at this point may keep the
# command below from recursing into the oauth objects.
update wp_options set option_value = replace(option_value, 'staging.fieldkit.org', 'www.fieldkit.test') where option_value like '%staging.fieldkit.org%';

EOF

# Notice we're using the domain w/o a schema (https/http) this ensures
# we also catch 'https%3A%2F%2F' So, remember that if this needs to
# change.

docker run -it --rm \
	--volumes-from fieldkit-wordpress \
	--network container:fieldkit-wordpress \
	wordpress:cli search-replace 'staging.fieldkit.org' 'www.fieldkit.test' \
	--recurse-objects --skip-tables=wp_users

# Helpful to tweak things w/o SSO:

docker run -it --rm \
	--volumes-from fieldkit-wordpress \
	--network container:fieldkit-wordpress \
	wordpress:cli user create admin admin@conservify.org --role=administrator
