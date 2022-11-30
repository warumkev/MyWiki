![socialLogo](https://user-images.githubusercontent.com/118884361/204816082-fa6df68e-4417-45a4-b7b7-f44e6eb5f15e.png)



# myWiki

## Erwartete Prüfungsleistung
---
>“Nutzer*innen sollen die Möglichkeit haben, beliebige Wiki-Seiten zu eröffnen und hierauf Informationen und Bilder einstellen zu können. Die Software soll im Intranet zu einem besseren Informationsaustausch beitragen.”

Programmieren sie mittels PHP eine benutzerfreundliche Web-Anwendung zurorganisation eines Wiki. Demonstrieren sie den von ihnen entwickelte Softwarequellcode, die Funktionsweise der Webseiten und die Architektur ihrer Anwendung. Begründen sie die von ihnen getroffenen Technologieentscheidungen und erklären sie ihr Vorgehen zu Umsetzung.

### Datenbankexport
---
Der aktuellste Stand der Datenbank findet sich in der `databaseDump.sql`.

### /assets/
---
In dem Assets-Ordner finden sich Bootstrap-Assets, welche zum Design der aktuellen Oberfläche genutzt werden. Diese sind öffentlich zugänglich unter https://getbootstrap.com/.

### /components/
---
Der einfachheithalber wurden Navbar, sowie Footer in diesen separaten Unterordner verschoben. Dies vereinfacht die websiteweite Bearbeitung der Komponenten.

### /includes/
---
In dem Includes-Ordner finden jene Dateien, die in PHP via `include()` in diverse Dateien eingebunden werden. Zwecks vereinfachung wurden diese Code-Snippets in einer separaten Datei gespeichert. Hier finden sich zum Beispiel die Suchfunktion oder auch das Nutzersystem.

### /img/
---
Dieser Ordner dient der Sammlung der Titelbilder der verschiedenen Beiträge.

## Support
---
Falls du Hilfe brauchst oder ein Problem gefunden hast, bitte öffne einen [`Issue`](https://github.com/kev9euf3rois/Wiki/issues)
