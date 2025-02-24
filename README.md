# Raktárkezelő Alkalmazás

Ez a projekt egy Laravel 11 alapú raktárkezelő alkalmazás API-ját tartalmazza. Az alkalmazás lehetővé teszi a felhasználók számára a készlet rögzítését, a készletmozgások követését és a beszállítók kezelését.

## Tartalomjegyzék

- [Funkciók](#funkciók)
- [Rendszerkövetelmények](#rendszerkövetelmények)
- [Telepítés](#telepítés)
- [Adatbázis szerkezet](#adatbázis-szerkezet)
- [API végpontok](#api-végpontok)
- [Használat](#használat)
- [Fejlesztői információk](#fejlesztői-információk)

## Funkciók

- Termékek kezelése (hozzáadás, módosítás, listázás)
- Beszállítók kezelése
- Készletmozgások rögzítése
- Raktárkészlet nyomon követése

## Rendszerkövetelmények

- PHP 8.1 vagy újabb
- Composer
- MySQL 5.7 vagy újabb
- Laravel 11

## Telepítés

1. Klónozza le a repót:
```
git clone https://github.com/yourusername/warehouse-management.git
```

2. Lépjen be a projekt könyvtárába:
```
cd warehouse-management
```

3. Telepítse a függőségeket:
```
composer install
```

4. Másolja le a `.env.example` fájlt `.env` néven és konfigurálja az adatbázis beállításokat.

5. Generáljon alkalmazás kulcsot:
```
php artisan key:generate
```

6. Futtassa a migrációkat:
```
php artisan migrate
```

7. (Opcionális) Töltse fel az adatbázist kezdeti adatokkal:
```
php artisan db:seed
```

## Adatbázis szerkezet

1. Products (Termékek)
- id (PRIMARY KEY)
- name (VARCHAR)
- category (VARCHAR)
- stock (INTEGER)
- supplier_id (FOREIGN KEY → Suppliers)

2. StockMovements (Készletmozgások)
- id (PRIMARY KEY)
- product_id (FOREIGN KEY → Products)
- type (VARCHAR, ENUM: "in", "out")
- quantity (INTEGER)
- date (TIMESTAMP)

3. Suppliers (Beszállítók)
- id (PRIMARY KEY)
- name (VARCHAR)
- contact_person (VARCHAR)
- phone (VARCHAR)

## API végpontok

- GET /api/products – Raktárkészlet listázása
- POST /api/products – Új termék hozzáadása
- PUT /api/products/:id – Termék módosítása
- GET /api/suppliers – Beszállítók listázása
- POST /api/suppliers – Új beszállító hozzáadása
- GET /api/suppliers/:id/products – Egy beszállító termékeinek lekérdezése
- POST /api/stock-movements – Készletmozgás rögzítése

## Használat

Az API használatához indítsa el a Laravel fejlesztői szervert:

```
php artisan serve
```

Ezután az API elérhető lesz a `http://localhost:8000/api` címen.

## Fejlesztői információk

### Modellek

A projekt három fő modellt használ: `Product`, `Supplier`, és `StockMovement`. Ezek a modellek a `app/Models` könyvtárban találhatók.

### Kontrollerek

Az API logikáját a következő kontrollerek kezelik:
- `ProductController`
- `SupplierController`
- `StockMovementController`

Ezek a kontrollerek az `app/Http/Controllers/API` könyvtárban találhatók.

### Seeder

Az alkalmazás tartalmaz egy `InventorySeeder`-t, amely kezdeti adatokkal tölti fel az adatbázist. A seeder futtatásához használja a következő parancsot:

```
php artisan db:seed --class=InventorySeeder
```


### Tesztelés

Az API teszteléséhez használhat olyan eszközöket, mint a Postman vagy a cURL. Győződjön meg róla, hogy a kérések tartalmazzák a megfelelő fejléceket és adatformátumokat.

---

További kérdések vagy problémák esetén kérjük, nyisson egy issue-t a GitHub repóban.