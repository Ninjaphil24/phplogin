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

## Gebaut mit

- HTML/CSS/Bootstrap, PHP/MYSQL, XAMPP, PHP 8.1.6, Composer version 2.3.5 
Ich habe auf die Verwendung von Javascript verzichtet, um die Leistungsfähigkeit allein durch PHP zu demonstrieren.


## Live Demo
[Live Demo Link](https://modinosloginregister.herokuapp.com/)

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
Um phplint auszuführen, verwende ich den folgenden Befehl im commandline: <br>
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

### Tests durchführen und Formatierung
Linters und php Code Sniffer im Repository eingerichtet und besteht alle Tests. Zur Formatierung wurde PHP Intelephense verwendet.

### Lokale Installation
Wenn Sie die App auf Ihrem lokalen Computer testen möchten, müssen Sie das Repository klonen und eine Datenbank namens „login“ erstellen, in die Sie die Datei „users.sql“ importieren müssen. Ich habe XAMPP als lokalen Host verwendet.  Um meine E-Mail-Adresse für automatische E-Mails zu verwenden, habe ich die Zeilen, die Sie ändern müssen, in den Code in der E-Mail eingefügt, die ich Ihnen mit dem Link zum Github-Repo gesendet habe.  Sie müßen PHPMailer installieren so wie es beschreibt ist oben.  

### Merkmale
Die Indexseite beginnt mit dem Login, der wie üblich über einen Button zur Registrierung führt.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/login.png" width="400" />
<br>
Wenn Sie auf "Registrierung" klicken, werden Sie auf die Registrierungsseite geleitet.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/register.png" width="400" />
<br>
Wenn Sie eine bereits vorhandene E-Mail-Adresse eingeben, hält Sie das System an.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/emailused.png" width="400" />
<br>
Wenn Sie bei der Registrierung nicht zweimal dasselbe Passwort eingeben, stoppt Sie das System.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/passwordmismatch.png" width="400" />
<br>

Bei erfolgreicher Registrierung werden Sie darüber informiert, dass eine E-Mail mit einem Link versendet wurde.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/verifsent.png" width="400" />
<br>

Ein Link wird mit einem Bestätigungscode gesendet.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/emaillink.png" width="800" />
<br>

Wenn Sie versuchen, sich anzumelden, ohne zuerst auf den Link zu klicken, stoppt das System Sie.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/unverified.png" width="400" />
<br>

Wenn Sie auf den Link klicken, werden Sie zur Anmeldeseite weitergeleitet, mit der Bestätigung, dass Ihr Konto verifiziert ist.

<b>Es gibt einen Fehler in der Heroku-Bereitstellung, den ich trotz zahlreicher Versuche nicht beheben konnte. Die Meldung <i>„Die Kontoverifizierung wurde erfolgreich abgeschlossen! Sie können sich jetzt unten einloggen:"</i> erscheint nicht. <u> Die Verifikation funktioniert jedoch ordnungsgemäß.</u></b> <br>
Um den Fehler für die Bereitstellung zu beheben, habe ich eine zusätzliche Datei namens „verify.php“ erstellt, in der die Bootstrap-Nachricht fest in HTML codiert ist. Diese Datei wird für die lokale Verwendung nicht benötigt und ist nicht in dem Repository enthalten, das ich Ihnen gesendet habe.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/verification.png" width="400" />
<br>
Wenn Sie versuchen, sich mit einer falschen E-Mail-Adresse oder einem falschen Passwort anzumelden, stoppt Sie das System.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/wrongemail.png" width="400" />
<br>
Wenn Sie verifiziert sind, können Sie sich anmelden und gelangen auf die „Hallo“-Seite, wo Sie sich auch abmelden können.<br>
<img src="https://github.com/Ninjaphil24/phplogin/blob/main/images/hello.png" width="400" />
<br>

### Deployment
Bereitstellung mit Apache2 auf Heroku.


### Unit Tests
Für Unit-Tests muss Codeception gemäß den Setup-Anweisungen [hier](https://codeception.com/quickstart) auf Ihrem Computer installiert werden.  Composer und PHP müßen auch installiert sein.  

Erstellen Sie irgendwo auf Ihrem Computer einen Ordner. Ich habe einen Ordner in htdocs auf XAMPP erstellt. Starten Sie eine Command Prompt innerhalb des Ordners und geben Sie die folgenden Befehle einzeln nacheinander ein:
```
composer require "codeception/codeception" --dev
php vendor/bin/codecept bootstrap
php vendor/bin/codecept generate:cest Acceptance Local

```
Ein Ordner mit dem Namen "tests" wird erstellt. In diesem Ordner befindet sich eine Datei namens Acceptance.suite.yml. Ersetzen Sie den Code in dieser Datei durch den folgenden Code:
```
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            # url: http://localhost/phplogin/docs/
            url: https://modinosloginregister.herokuapp.com/

step_decorators: ~

```
Wenn Sie die App lokal testen möchten, müssen Sie die lokale URL auskommentieren und gegebenenfalls anpassen, wie Sie Ihren Ordner erstellt haben, und die Live-URL auskommentieren.
Innerhalb des Ordners „tests“ befindet sich ein Ordner namens „Acceptance“. In diesem Ordner befindet sich eine Datei namens <b>LocalCest.php</b>. Löschen Sie diese Datei und ersetzen Sie sie durch die Datei <b>LocalCest.php</b>, die im Root Directory des Github-Repositorys enthalten ist.  Nachdem Sie dies getan haben, können Sie die Tests in Ihrer Command Line ausführen, indem Sie den folgenden Befehl verwenden:
```
php vendor/bin/codecept run --steps
```



👤 **Autor**

- GitHub: [@Ninjaphil24](https://github.com/Ninjaphil24)
- Twitter: [@PModinos](https://twitter.com/PModinos)
- LinkedIn: [Philip Modinos](https://www.linkedin.com/in/philip-modinos-14195021/)

