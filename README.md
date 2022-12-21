![socialLogo](https://user-images.githubusercontent.com/118884361/204816082-fa6df68e-4417-45a4-b7b7-f44e6eb5f15e.png)

# myWiki

## Über uns

---

Bei myWiki handelt es sich um unser Prüfungsprojekt. Nutzer\*innen sollen die Möglichkeit haben, beliebige Wiki-Seiten zu eröffnen und hierauf Informationen und Bilder einstellen zu können. Die Software soll im Intranet zu einem besseren Informationsaustausch beitragen.

## Erwartete Prüfungsleistung

---

> “Nutzer\*innen sollen die Möglichkeit haben, beliebige Wiki-Seiten zu eröffnen und hierauf Informationen und Bilder einstellen zu können. Die Software soll im Intranet zu einem besseren Informationsaustausch beitragen.”

Programmieren sie mittels PHP eine benutzerfreundliche Web-Anwendung zurorganisation eines Wiki. Demonstrieren sie den von ihnen entwickelte Softwarequellcode, die Funktionsweise der Webseiten und die Architektur ihrer Anwendung. Begründen sie die von ihnen getroffenen Technologieentscheidungen und erklären sie ihr Vorgehen zu Umsetzung.

## Features

---

- Voll funktionsfähiges Nutzersystem
- Registrierung, Anmeldung, und Löschen von Nutzeraccounts
- Unterteilung von Nutzern in Admin und User
- Beiträge erstellen, bearbeiten, suchen und lesen.
- Design der Beiträge mit Markdown
- Zufälligen Beitrag öffnen

## Getting Started

### Anforderungen

Wir nutzen folgende Software zur Entwicklung:

- PostgreSQL
- pgAdmin
- Apache24
- PHP8

### Datenbank

1. In pgadmin go to `Object` > `Create` > `Database...` > `SQL` and run the query from `CREATE DATABASE` in the [databaseDump.sql](databaseDump.sql)
2. Open the Query Tool (Alt + Shift + Q) and run the query from `CREATE TABLES`
3. After that you can run the querys at [faker.sql](faker.sql) to get some example data in your database

### Projekt

1. Zugangsdaten in [credentials.php](/includes/credentials.php) eintragen
```php
<?php

    $host = ""; // localhost
    $port = ""; // 5432
    $db = ""; // myWiki
    $user = ""; // postgres
    $pw = "";

?>
```

### Projektstruktur

[PROJECT_STRUCTURE.md](PROJECT_STRUCTURE.md)

## Support

---

Falls du Hilfe brauchst oder ein Problem gefunden hast, bitte öffne einen [`Issue`](https://github.com/kev9euf3rois/Wiki/issues)
