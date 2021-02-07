#!/bin/bash

case $1 in
  production)
    dest_key=$DEST_KEY_PROD
    dest_user=$DEST_USER_PROD
    dest_host=$DEST_HOST_PROD
    dest_wp_root_dir=$DEST_WP_ROOT_DIR_PROD
  ;;
  staging)
    dest_key=$DEST_KEY_STG
    dest_user=$DEST_USER_STG
    dest_host=$DEST_HOST_STG
    dest_wp_root_dir=$DEST_WP_ROOT_DIR_STG
  ;;
  development)
    dest_key=$DEST_KEY_DEV
    dest_user=$DEST_USER_DEV
    dest_host=$DEST_HOST_DEV
    dest_wp_root_dir=$DEST_WP_ROOT_DIR_DEV
  ;;
esac

echo "$dest_key" | base64 --decode >/tmp/rsync_rsa
chmod 600 /tmp/rsync_rsa
ssh-keyscan $dest_host >> ~/.ssh/known_hosts
rsync -a -e "ssh -i /tmp/rsync_rsa" $TRAVIS_BUILD_DIR/fieldkit $dest_user@$dest_host:$dest_wp_root_dir/wp-content/themes/
