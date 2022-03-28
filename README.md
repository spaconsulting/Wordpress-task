# Wordpress Invoice PDF Task


- [Wordpress Invoice PDF Task](#wordpress-invoice-pdf-task)
- [Introduktion](#introduktion)
- [Installation](#installation)
  - [Windows / WSL2 / macOS](#windows--wsl2--macos)
  - [Linux](#linux)
- [Opsætning](#opsætning)
- [Udviklings Guide](#udviklings-guide)
- [FAQ](#faq)
  - [Hvordan får man en bruger til at have købt et produkt](#hvordan-får-man-en-bruger-til-at-have-købt-et-produkt)

# Introduktion
I Innowell uddanner vi mange studerende hele året rundt. De studerende køber adgang til online materiale i form af tekster, quizzer, opgaver m.m. hvor vi har undervisere der retter og senere sender dem til en eksamen.
Dette koster selvfølgelig penge og derfor skal de studerende have adgang til en faktura i PDF-format hver gang de tilmelder sig et kursus/uddannelse.

Denne opgave omhandler at genere PDF fakturaer til hver bruger.

Den genererede PDF skal vises i browseren uden at gemme det på serveren.
Idéen med dette er at alle fakturaerne ikke fylder på serveren.

en faktura skal indeholde:
- Navn på bruger
- Adresse på bruger
- Dato på tilmelding af kurset
- Unik faktura id. Dette id skal være det samme, hvis fakturaen lukkes og åbnes igen.
- Kursusnavn
- Kursuspris

Fakturaens udseende er ikke vigtigt

Generering af en faktura i PDF format kan ske ved brug af FPDF http://www.fpdf.org/

# Installation
For at påbegynde opgaven skal wordpress installeres. Dette gøres igennem docker. Hvis du aldrig har brugt docker før er det intet problem.

- Installer docker (se under for mere hjælp)
- Når docker er installeret, naviger til dette repo i terminalen
- Brug kommandoen ´docker compose up -d´.
- Efter kommandoen er kørt færdig skulle wordpress meget gerne køre på [localhost:8080](http://localhost:8080)

## Windows / WSL2 / macOS
Ved Windows / WSL2 / macOS anbefales det at bruge [Docker Desktop](https://www.docker.com/get-started/)

***NB: Bruges der WSL2 skal WSL2 engine anvendes under docker desktop settings***

## Linux
Ved linux, installer docker ved hjælp af denne guide: https://docs.docker.com/engine/install/

# Opsætning

Før at du kan påbegynde opgaven, skal der opsættes nogle ting. Der antages at wordpress er på engelsk, men 

1. Installér WooCommerce
   1. Gå ind i [Wordpress Admin Panelet](http://localhost:8080/wp-admin)
   2. Tryk på "Plugins"
   3. Øverst tryk på "Add New"
   4. Søg på "WooCommerce"
   5. Tryk "Install Now" på "WooCommerce" (by Automattic).
   6. Aktiver WooCommerce inde under Plugins.
      - Ignorer de andre 2 forinstallerede plugins
2. Anvend child theme:
   1. Gå ind i [Wordpress Admin Panelet](http://localhost:8080/wp-admin)
   2. Tryk under "Appearance" i sidepanelet til venstre
   3. Hold musen over "Child Theme for Twenty Twenty-Two" og tryk "Activate"


# Udviklings Guide

Hvis at [opsætning](#opsætning) er gennemført, kan opgaven påbegyndes. 

Du kan starte i filen invoices.php under twentytwentytwo-child mappen, enhver ændring der sker i filen bliver reflekteret på siden under "My account" --> "Invoices" som kan tilgås på forsiden af din wordpress installation.

Hvis du gør brug af css kan dette ske via style.css filen under "twentytwentytwo-child".

Tag god brug af [Wordpress Developer Resources](https://developer.wordpress.org/) og [WooCommerce Developer Resources](https://developer.woocommerce.com/). Du skal blandt andet finde ud af hvordan du får fat i brugers købte produkter.

Det er en god idé at lave nogle "falske" brugere og produkter på din side, så du kan teste om dit kode virker. Du kan tilføje brugere og produkter i wordpress kontrolpanelet.

# FAQ
  
## Hvordan får man en bruger til at have købt et produkt
Dette gør man ved at gå ind i [wordpress kontrolpanelet](http://localhost:8080/wp-admin/). Derefter ind under Orders i WooCommerce.

Herinde kan man så oprette orders. Man sætter "Customer" til den bruger der skal have produktet. Og tilføjer produktet via "Add item(s)". Og sætter "Status" til "Completed".

