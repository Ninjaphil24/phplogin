# Standard PHP Registrierung und Login mit Aktivierungslink Email

## Voraussetzungen der Aufgabe
> Aufgabe:
Erstelle ein System in PHP mit einem einfachen Registrierungs-Flow:

1. Das Frontend hat eine einfache Seite zur "Registrierung" (Benutzername, Passwort) und eine Seite zum "Login"
2. Das Backend erhält die Registrierung und schickt eine E-Mail an den Benutzer raus um sein Konto zu aktivieren
3. Der Nutzer kann auf einen Link in der E-Mail klicken und danach ist sein Konto aktiviert.
4. Nach der Aktivierung kann sich der Benutzer einloggen (und sieht einen einfachen "Hallo" Bildschirm)

Was wollen wir sehen:
- hohe Codequalität
- Testabdeckung
- Production-ready code - so wie du auch eine Aufgabe hier in der Firma lösen würdest
- Abgabe bitte als github mit Anweisungen wie wir es testen können bis zum 2. November 2022

![screenshot](./images/readmedemo.png)

## Gebaut mit

- HTML/CSS, PHP/MYSQL, phpMyAdmin

## Live Demo
[Live Demo Link](https://ninjaphil24.github.io/portfolio_1/)
### Prerequisites
Jeder Standardbrowser.  
### Install
Installieren Sie für die Aktivierung und Komponententests auf Ihrem lokalen Computer XAMPP, klonen Sie das Repository in htdocs und erstellen Sie eine Datenbank, indem Sie die Datei db.sql importieren.
### Code Sniffer und Linters-Installation

Code Sniffer und Linters wurden lokal mit den folgenden Befehlen in der Powershell installiert: 
```
composer require squizlabs/php_codesniffer

composer require overtrue/phplint --dev
```
In composer.json brauchen Sie die folgenden scripts:
```
"scripts": {<br>
        "lint":"phplint --no-cache src/",<br>
        "phpcs": "phpcs --standard=PSR12 src/",<br>
        "phpcbf": "phpcbf --standard=PSR12 src/"<br>
    }
```
Um phplint auszuführen, verwende ich den folgenden Befehl in der Befehlszeile innerhalb des commandline: <br>
```
./vendor/bin/phplint --no-cache src/ 
```
<br><br>
Sobald phplint lokal konfiguriert wurde, wurde es zu github gepusht und dann wurde ein Workflow mit dem PHP-Plugin von Github Actions eingerichtet auf dem Repository.  Im Github workflows folder im Repository können Sie die Konfiguration vom phplint.yml file sehen.  
### PHPMailer
PHPMailer wurde mit dem folgenden Befehl in der Commandline mit Composer heruntergeladen: <br><br>
```
composer require phpmailer/phpmailer
```
 <br><br>
Mehr über PHPMailer können Sie im folgenden Github Repo lesen:<br><br>
https://github.com/PHPMailer/PHPMailer

### Verwendungszweck
Einfache Eingabe von Benutzername und Passwort. Der Link in der E-Mail wird gesendet, um das Konto zu aktivieren.
### Tests durchführen
Linters im Repository eingerichtet und besteht alle Tests. Für Unit-Tests muss Codeception gemäß den Setup-Anweisungen [hier](https://codeception.com/quickstart) auf Ihrem Computer installiert werden: 
Befolgen Sie die nummerierten Anweisungen, nicht die "Simplified Setup". Geben Sie in Schritt 4 die folgende URL in Ihre Datei tests/Acceptance.suite.yml ein.
### Deployment
Bereitstellung mit Apache auf freeWHA.
[Link to freeWHA](https://www.freewebhostingarea.com/)

👤 **Autor**

- GitHub: [@Ninjaphil24](https://github.com/Ninjaphil24)
- Twitter: [@PModinos](https://twitter.com/PModinos)
- LinkedIn: [Philip Modinos](https://www.linkedin.com/in/philip-modinos-14195021/)

