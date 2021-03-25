#Toto je testovací Demo obchod Remante.cz
- je vytvořen ve frameworku Laravel 



## Instalace
- spustit "composer install"
- nastavit si .env 
- založit si DB 
- založit adresáře storage/app/public storage/framework/cache, storage/framework/sessions, storage/framework/views vše s 0777
- chmod 0777 do storage
- spustit php artisan storage:link
- spustit "php artisan migrate:fresh"
- spustit "php artisan import:product" - chvilku strpení, stahuje to data
  
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


