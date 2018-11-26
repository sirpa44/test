# test OAT API REST

creation of an API REST 

## instructions

send a request by URL and display the data in Json format

## database configuration

  - create the database with the file /config/database.sql
  - configure the database with the file /config/database.ini.dist
    * fill the file with your settings
    * rename the file as database.ini

## running the test

send parameters by url:
  - controller=api
  - format={json||csv||database}
  - method={showOne||showAll}
  - id=<integer> (optional, use it if you need only one user)