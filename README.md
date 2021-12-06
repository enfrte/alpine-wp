# alpine-wp

A very simple site using headless WordPress and AlpineJS on the frontend.

## Ingredients 

Uses AlpineJS, the [WP GraphQL Wordpress plugin](https://www.wpgraphql.com/), and Tachyons CSS.

## .htaccess

You will probably want to stick this in some folder and point your root domain to it

If so, your .htaccess should be something like this 

    php_value display_errors Off
    php_flag magic_quotes 1
    php_flag magic_quotes_gpc 1
    php_value mbstring.http_input auto
    php_value date.timezone Europe/Helsinki

    # BEGIN WordPress
    <IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteCond %{HTTP_HOST} ^(www.)?codinginthecold.byethost5.com$
    RewriteCond %{REQUEST_URI} !^/alpine-src/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /alpine-src/$1
    RewriteCond %{HTTP_HOST} ^(www.)?codinginthecold.byethost5.com$
    RewriteRule ^(/)?$ alpine-src/index.php [L] 
    </IfModule>
    # END WordPress

## Getting started

See config.php and headless_wp_queries.php 
