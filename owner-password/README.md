# Resource Owner Password Grant Demo

## Installation Instructions and Requirements
1. Ensure Composer is installed
2. Change CWD to demo root directory
3. Run `composer install` in the demo root
4. Create a private key with command `openssl genrsa -out private.key 2048`
5. Change the private key permissions with `chmod 660 private.key`
6. Create a public key with `openssl rsa -in private.key -pubout -out public.key`
7. `cd` into the **public** directory
8. Start the PHP server with command `php -S localhost:4444`

## Steps for testing the example
Using **cURL** send an auth request

```
curl -X "POST" "http://localhost:4444/password.php/access_token" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -H "Accept: 1.0" \
    --data-urlencode "grant_type=password" \
    --data-urlencode "client_id=app-client-id" \
    --data-urlencode "client_secret=app-secret-78945" \
    --data-urlencode "username=mayur" \
    --data-urlencode "password=mayur-854697" \
    --data-urlencode "scope=basic email" \
```