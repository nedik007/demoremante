#Toto je testovací Demo obchod Remante.cz
- je vytvořen ve frameworku Laravel 



## Instalace
- spustit "composer install"
- nastavit si .env 
- založit si DB 
- spustit "php artisan migrate:fresh"
- spustit "php artisan import:product"
- a tradá, mělo by to fungovat


## Frontend
- možnost klikat na kategorie
- možnost sortovat v kategoriích dle ceny a názvu
- možnost stránkovat
- možnost prokliknout se do detailu produktu
- možnost nakoupit (tak nějak skoro nakoupit :-) )
- možnost exportu do CSV
- vyhledávání - jednoduché, pomocí LIKE

## Admin
- velmi jednoduchý admin
- velmi jednoduše vyřešeno přihlašování (heslo je "admin") - není použité žádné sofistikované přihlašování přes DB
- možnost editovat jednotlivé produkty
- možnost vytvořit produkt


## Testy
- pro demonstraci jsem vytvořil jeden test (není tady mnoho co testovat)
- stačí si nastavit .env.testing (databázi)
- pak spustit "bash startTests.sh"


