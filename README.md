# SIKASIF – Ciamis Regency KPU

### Laravel-Based Correspondence Management System

A web application for managing incoming letters, outgoing letters, and dispositions, developed for **KPU Kabupaten Ciamis**.

---

## Features

### Authentication

* Login & Logout
* User roles: **Admin** & **Staff**

### Dashboard

* Number of incoming letters today
* Number of outgoing letters today
* Number of dispositions today
* Total letter transactions today
* Number of active users
* Percentage increase/decrease for:

  * Incoming letters
  * Outgoing letters
  * Dispositions
  * Total transactions

### Incoming Mail Management

* Add incoming mail
* Edit incoming mail
* Delete incoming mail
* View details
* Search by sender, letter number, or agenda number
* Add attachments
* Delete attachments
* Add dispositions
* Delete dispositions

### Outgoing Mail Management

* Add outgoing mail
* Edit outgoing mail
* Delete outgoing mail
* View details
* Search by sender, letter number, or agenda number
* Add attachments
* Delete attachments

### Incoming Mail Agenda

* Search by creation date
* Search by letter date
* Search by received date
* Print agenda

### Outgoing Mail Agenda

* Search by creation date
* Search by letter date
* Print agenda

### Incoming Mail Gallery

* View all attachments
* Download attachments

### Outgoing Mail Gallery

* View all attachments
* Download attachments

### Letter Classification Reference

* Add classification
* Edit classification
* Delete classification

### Letter Nature/Status Reference

* Add status
* Edit status
* Delete status

### User Management (Admin only)

* Add user
* Edit user
* Deactivate user
* Delete user
* Reset password

### Profile Page

* Update name, email, and phone number
* Update profile picture
* Deactivate account (Staff only)

### Settings (Admin only)

* Configure default password
* Set pagination limit
* Set application name
* Set institution name
* Set institution address
* Set institution phone number
* Set institution email
* Set responsible person

---

## Database Schema

![Database Schema](https://github.com/404NotFoundIndonesia/laravel-surat-menyurat-v1/blob/main/database_schema.png)

---

## Installation

Recommended PHP version: **> 8.1.0**

Clone the repository, open your terminal, and navigate to the project directory.

You may use **Makefile Setup** or **Manual Setup**.

---

## Makefile Setup

### Initial Setup

```
make setup
```

### Configure `.env`

Create a new MySQL database and update the `.env` file.

### Setup Database

```
make setup-db
```

Or with dummy data:

```
make setup-dummy
```

### Run the App

```
make run
```

---

## Manual Setup

### Install Dependencies

```
composer install
```

### Copy Environment File

```
cp .env.example .env
```

### Generate App Key

```
php artisan key:generate
```

### Link Storage

```
php artisan storage:link
```

### Run Migrations

```
php artisan migrate
```

### Seed Admin User

```
php artisan db:seed --class=UserSeeder
```

### Seed Config

```
php artisan db:seed --class=ConfigSeeder
```

### (Optional) Seed Dummy Data

```
php artisan db:seed
```

### Run Server

```
php artisan serve
```

---

## Login

Default credentials:

| Email    | [admin@admin.com](mailto:admin@admin.com) |
| -------- | ----------------------------------------- |
| Password | admin                                     |

---

## Language

Supports **English** and **Indonesian**.

To change language, edit `config/app.php`:

```
'locale' => 'en' // or 'id'
```

---

## Timezone

Edit timezone in `config/app.php`:

```
'timezone' => 'Asia/Jakarta'
```

Or refer to PHP timezone documentation for alternatives.
