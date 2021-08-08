# Ausgabentracker
HS Ansbach - Studienarbeit client server SS 2021 von Kristin Opp

Das Projekt wurde mit XAMPP erstellt. Als Startseite dient index.php

Das Projekt findet sich unter **http://ausgabentracker.kristinopp.de/login.php**. Der Code und die Dokumentation können unter **https://github.com/kris-dino/ausgabentracker** aufgerufen werden.

**benutzername: kristin**

**passwort: sta-cs**

Ausgabentracker dient dazu, die eigenen Finanzen im Überblick zu behalten. Nach dem Login gelangt der/die BenutzerIn auf index.php, von wo aus er/sie zu verschiedenen Unterseiten gelangt:

**1) Buchungen hinzufügen**

Eine Buchung besteht aus Datum, Betrag in €, Kategorie (aus Dropdown auswählen) und Verwendungszweck. Nach dem Klick auf submit wird die Buchung zur Tabelle hinzugefügt und ist unter dem Reiter Übersicht zu sehen.

**2) Übersicht über die getätigten Buchungen erhalten**

Siehe "Probleme".

**3) Übersicht über die eingetragenen Kategorien erhalten und neue Kategorie erstellen**

Um eine Buchung tätigen zu können, muss diese einer Kategorie zugewiesen werden. Eine neue Kategorie kann über den "+ Button" erstellt werden. Unter dem Reiter Kategorien findet man außerdem alle bisher erstellten Kategorien in einer Tabelle. Die erstellten Kategorien werden zum drop down menü des Buchungsformulars hinzugefügt.

Sind alle Buchungen eingetragen, kann sich der/die Anwenderin per "Logout Button" abmelden.

# Probleme

Unter **create_buchung.php** soll der/die BenutzerIn eine neue Buchung über das Formular in die Datenbank "moneydb" eintragen können. Das ist mir allerdings nicht gelungen. Aus mir nicht nachvollziehbaren Gründen wird die Fehlermeldung "Undefined index: katid in ausgabentracker\create_buchung.php on line 36" ausgegeben. Trotz Recherchen und Nachfragen bei KommillitonInnen konnte ich das Problem nicht beheben.

Ursprünglich war geplant, die verschiedenen Buchungen nach Datum und/oder Kategorie zu filtern. Da ich mich bis zuletzt mit dem oben beschriebenen Problem auseinandergesetzt habe, konnte ich diese Funktion leider nicht mehr realisieren.
 
