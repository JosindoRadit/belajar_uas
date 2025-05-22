# Laravel CRUD Generator

Proyek ini adalah aplikasi Laravel dengan fitur **generator CRUD otomatis** menggunakan command kustom `make:crud-controller`. Cocok untuk mempercepat proses pengembangan backend dan antarmuka admin.

## ✨ Fitur

- Command Artisan: `php artisan make:crud-controller NamaModel --fields=nama:string,email:email,...`
- Otomatis membuat:
  - Controller dengan fungsi lengkap (index, create, store, edit, update, destroy)
  - Route resource ke `routes/web.php`
  - View: `index.blade.php`, `edit.blade.php`, dan `create.blade.php` di `resources/views/admin/<nama-model>`
- Validasi otomatis di controller berdasarkan tipe field

## 🛠 Instalasi

1. **Clone repositori:**

   ```bash
   git clone git@github.com:Arya0D/laravel-arya.git
   cd laravel-arya
   ```
2. **Install dependency:**
   ```bash
   conposer install
   ```
3. **Copy dan edit file environment::**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

## ✨ Cara Menggunakan Generator
  ```bash
  php artisan make:crud-controller Dosen --fields=nama:string,nidn:string,email:email,prodi:string
   ```
Command di atas akan menghasilkan:
- app/Http/Controllers/DosenController.php -> Controller CRUD untuk dosen
- Route resource ```Route::resource('dosen', DosenController::class);```
- Views:

## 📂 Struktur Direktori Views
```text
resources/views/
└── admin/
    └── dosen/
        ├── index.blade.php -> untuk halaman utama yang menunjukan tabel
        ├── create.blade.php -> untuk halaman form tambah
        └── edit.blade.php -> untuk halaman form edit
```

## 🧪 Testing
- Jalankan server Laravel:
```
php artisan serve
```
Buka ```http://localhost:8000/dosen``` untuk melihat halaman CRUD yang dibuat.

- Debuging:


  
