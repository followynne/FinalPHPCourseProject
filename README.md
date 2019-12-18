# Progetto finale del corso "PHP Programming"
### Gruppo: M. Gregoricchio[(matteogregoricchio.com)], D. Carbonati[(https://github.com/DaviCarbo)], I. Lo Presti[(https://github.com/lucyilaria)]

Progetto finale del corso curricolare di programmazione in PHP presso **l'ITS ICT Piemonte**.
Il progetto consistetà di una *web-application* che simulerà il funzionamento un quotidino online.

### Testo d'esame:
> Realizzare un'applicazione PHP per la gestione di un quotidiano online con almeno:
> - una home con un estratto degli articoli del giorno
> - una pagina dell'articolo completo
> - una login per entrare nell'area di amministrazione
> - un sistema di gestione articoli con operazioni CRUD
> - una pagina di logout

## Requisiti tecnici:

- Utilizzare il framework "scolastico" MVC [Simple MVC](https://github.com/ezimuel/simplemvc). Vedi README_MVC.md
- Memorizzare gli articoli su database MySql o MariaDB (verrà utilizzato [MySql](https://www.mysql.com/it/)).
- Utilizzare la classe [PDO](https://www.php.net/manual/en/book.pdo.php) per l'accesso al DB.
- Eseguire almeno un test unitario con [PHPUnit](https://phpunit.de/).

## Configurazione su macchina Linux:
Per usare il progetto è necessario avere installati sulla propria macchina Linux i seguenti applicativi:
**- MySql**
**- PHP**
**- Composer**

Dopo aver clonato il progetto tramite shell con il comando
```
git clone https://github.com/followynne/FinalPHPCourseProject [chooseFolderName]
```

è necessario procedere a installare le dipendenza usando il seguente comando in shell dalla root del progetto:
```
composer install
```

Per creare e settare database e utenti che vengono usati dall'applicativo, eseguire i seguenti comandi come *root user* in shell dalla root del progetto.
Si prega di sostituire con degli username/password scelti i valori indicati tra []. 
```
$ sudo mysql FinalCourse < config/prjdbwithfakedata.sql
$ sudo mysql
$ GRANT SELECT ON FinalCourse.* TO '[readonlyusername]'@'localhost' IDENTIFIED BY '[password]'; // crea un utente per le operazioni read
$ GRANT ALL PRIVILEGES ON FinalCourse.* TO '[dbadminusername]'@'localhost' IDENTIFIED BY '[password2]'; // crea un utente per le operazioni CRUD
$ FLUSH PRIVILEGES;
```

Il file .sql in config/ carica già dei sample data. Come user di test è possibile usare l'utente:
- username: *prova@prova.it*
- password: *marcone*

Dentro la cartella *config/* è necessario modificare il file **.env.example**.
Per prima cosa rinominare il file come **.env** (attenzione a non rinominarlo come .env.txt). Successivamente sostituire i valori *yourvalue* con gli username/password del database inseriti poco prima.
I campi user e password si riferiscono all'utente per operazioni CRUD, user_readOnly e password_readOnly all'utente per operazioni read.

Una volta che sono state eseguite queste operazioni, dalla root folder eseguire in shell i seguenti comandi:
```
php -S 0.0.0.0:4000 -t public/
```
Aprire **localhost:4000**, se compaiono degli articoli il progetto è configurato e pronto all'uso! Have Fun!
