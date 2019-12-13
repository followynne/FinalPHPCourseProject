# Progetto finale del corso "PHP Programming"
### Gruppo: M. Gregoricchio, D. Carbonati, I. Lo Presti

## Note:

Progetto finale del corso curricolare di programmazione in PHP presso **l'ITS ICT Piemonte**.

Il progetto consistetà di una *web-application* che simulerà il funzionamento un quotidino online.

## Requisiti:

- Utilizzare il framework "scolastico" MVC [Simple MVC](https://github.com/ezimuel/simplemvc).
- Memorizzare gli articoli su DB (verrà utilizzato [Maria DB](https://mariadb.org/)).
- Utilizzare la classe [PDO](https://www.php.net/manual/en/book.pdo.php) per l'accesso al DB.
- Eseguire almeno un test unitario con [PHPUnit](https://phpunit.de/).

## Istruzioni - WIP:
creare 2 utenti db per il db importato -> instr. entrando come root
grant select on database_name.* to 'read-only_user_name'@'%' identified by 'password';
flush privileges;

import : mysql -u user -p dbname < sqlscript.sql
export: mysqldump -u username -p databasename > filename.sql

prova@prova.it pw: marcone -> user for testing

modificare .env example in config con i valori dell'utenza creata