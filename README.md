# test OAT API REST

creation of an API REST 

## instructions

send a request by URL and display the data in Json format

## database mysql configuration

  - create the database
    * mysql -u <username> -p < Src/Source/mysql.sql
  - configure the database with the file /config/mysql.ini.dist
    * fill the file with your settings
    * rename the file as mysql.ini

## running the test

send parameters by url:
  - controller=api
  - format={json||csv||mysql}
  - method={showOne||showAll}
  - id=<integer> (optional, use it if you need only one user)