https://api.themoviedb.org/3/discover/movie/?api_key=8804da8efecd504320eb35f0438ea339

### how to locally deploy pantheon's site:

1. git clone
2. # composer install
3. create .lando.yml
   name: d9tsport
   recipe: drupal9
   config:
   php: "8.1"
   webroot: web
   service:
   myservice1:
   type: phpmyadmin
4. lando start
5. during local installation from UI let change host to
   all for DB: drupal9

   'database.d9tsport.internal' (advance settings)

6. lando db-import
   ando db-import d9t3port_dev_2022-12-05T14-45-07_UTC_database.sql

7. activate the modules from UI
   (please, do it module by module and clear the cash after each of):
   feeds
   feeds_ex
   feeds_fetcher_headers
   key
   REST
