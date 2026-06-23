#Cara Setup
1. Lakukan cloning pada repository proyek RideNow melalui terminal: 
git clone https://github.com/marcellinofebrian08-cloud/RideNow.git

2. Masuk ke dalam directory project:
cd RideNow-app

3. Install dependencies atau package yang dibutuhkan oleh aplikasi:
composer install

4. Lakukan konfigurasi lingkungan (.env):
cp .env.example .env 

5. Membuat kunci aplikasi / app key untuk keamanan:
php artisan key:generate

6. Membuat link ke folder storage publik agar gambar dan file unggahan dapat ditampilkan: 
php artisan storage:link

7. Setup database dengan run migrations database
php artisan migrate

8. Jalankan seeding untuk mengisi data dummy: 
php artisan db:seed

9. Jalankan server aplikasi: 
php artisan serve
Aplikasi akan berjalan di alamat [http://127.0.0.1:8000]
