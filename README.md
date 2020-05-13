# FieldKit Theme

## Requirements

- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)
- [Node Version Manager](https://github.com/creationix/nvm)
- [Node.js](https://nodejs.org/)
- [OpenSSL](https://www.openssl.org/)
- [Sass](https://sass-lang.com/)

## Setup

1. Use the Node.js version specified in the `.nvmrc` file.

```sh
nvm use
```

2. Install the dependencies.

```sh
npm install
composer install
```

3. Run the build.

```sh
npm run build
```

4. Add the following entries to your hosts file:

- `127.0.0.1 fieldkit.test`.
- `127.0.0.1 www.fieldkit.test`.

5. Generate a self-signed certificate.

```sh
mkdir certs
openssl req \
  -newkey rsa:2048 -nodes -keyout certs/fieldkit.test.key \
  -x509 -days 365 -out certs/fieldkit.test.crt \
  -subj "/CN=*.fieldkit.test" \
  -addext "subjectAltName=DNS:*.fieldkit.test"
```

6. Change the trust settings of the certificate for SSL on your device.

7. Start the local development environment.

```sh
docker-compose up -d
```

8. Open https://www.fieldkit.test/ in a web browser.

## Docker Commands

### Restoring from a dump file

```sh
docker exec -i fieldkit-mysql mysql -uwordpress -pwordpress wordpress < mysql.sql
```

Replace `mysql.sql` with the path of the dump file.

### Search and replace URLs in the database

```sh
docker run -it --rm \
  --volumes-from fieldkit-wordpress \
  --network container:fieldkit-wordpress \
  wordpress:cli search-replace 'https://www.fieldkit.com' 'https://www.fieldkit.test' \
  --recurse-objects --skip-tables=wp_users
```

Replace `https://www.fieldkit.org` with the search string.

### Create a new user in WordPress

```sh
docker run -it --rm \
  --volumes-from fieldkit-wordpress \
  --network container:fieldkit-wordpress \
  wordpress:cli user create bob bob@example.com --role=administrator
```

Replace `bob` with the user’s username and `bob@example.com` with the user’s email.
