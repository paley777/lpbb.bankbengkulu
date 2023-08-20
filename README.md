![Logo](https://i.postimg.cc/cJ9YtyjC/Logo-LPBBArtboard-1-copy-4.jpg)

# Learning Program Bank Bengkulu (LPBB) 
Learning Program Bank Bengkulu (LPBB) adalah sistem e-learning yang diperuntukkan bagi pegawai Bank Bengkulu. E-Learning ini dikembangkan oleh Valleryan Virgil Zuliuskandar. Sistem ini memiliki beragam fitur mulai dari hulu hingga hilir pembelajaran (belajar-ujian-sertifikasi).



## Integrasi
Sistem ini selain menggunakan Laravel 10. Juga mengintegrasikan Framework Bootstrap sebagai front-end. Sistem ini menggunakan database SQL dan dalam pengembangannya menggunakan software MySQL Workbench.


## Fitur Utama Pengguna

- Manajemen Kelas
- Manajemen Ujian
- Manajemen Sertifikasi





## Fitur Sistem

- Laravel 10
- Using Eloquent from Laravel
- Templating for header and footer
- Full CRUD Integrating
- Authentication from Laravel
- Upload and Update Images
- Import Data via Spreadsheet
- Export Data full automation.
- Data Visualization to Chart.
  

## Optimalisasi

N+1 Problems

## Run Locally

Clone the project

```bash
  git clone https://github.com/paley777/lpbb.bankbengkulu.git
```

Go to the project directory

```bash
  cd lpbb
```

Install dependencies

```bash
  composer install
```

Delete Cache

```bash
  php artisan cache:clear
```
Generate Laravel Key

```bash
  php artisan key:generate
```
Make Storage Link

```bash
  php artisan storage:link
```
Migrate

```bash
   php artisan migrate
```
Start the server

```bash
   php artisan serve
```


## Screenshots

![App Screenshot](https://i.postimg.cc/TP8B8FQy/image.png)
![App Screenshot](https://i.postimg.cc/K8Ts5QFm/image.png)


## Saran

Untuk saran dan masukan sistem ini harap berkenan email ke valleryan1212@gmail.com
