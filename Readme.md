# Meta Robots pro Kategorie/Produkt/CMS-Seite
## Install
im Magento 2 root Verzeichnis folgendes Ausführen:
```bash
mkdir -p app/code/DisappointedMoose/Robots
git clone https://github.com/DisappointedMoose/magento2-robots.git app/code/DisappointedMoose/Robots
bin/magento module:enable DisappointedMoose_Robots
bin/magento setup:upgrade
```

Falls Magento im Production Mode ist:
```bash
bin/magento setup:static-content:deploy
```

## Nutzung
Bei Kategorien, Produkten und CMS-Seiten befindet sind nun jeweils im Tab
"Search Engine Optimization" ein neues Dropdown "Meta Robots". Hiermit kann
der Wert des Robots-Metatags für eine einzelne Seite/Kategorie/Produkt gesetzt
werden. Mögliche Werte sind `INDEX, FOLLOW`, `INDEX, NOFOLLOW`, `NOINDEX, FOLLOW`,
`NOINDEX, NOFOLLOW`. Ist bei einer Seite/Kategorie/Produkt kein expliziter Wert
gesetzt, so wird der Standardwert verwendet der unter 
`Content / Design / Configuration` im Abschnitt `Search Engine Robots` des jeweiligen
Designs eingestellt werden kann.