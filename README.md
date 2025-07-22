# 📚 Larateca

**Larateca** es una plataforma web de reseñas de libros desarrollada con Laravel 10 y Laravel Breeze. Permite a los usuarios registrarse, autenticarse y participar activamente calificando libros mediante estrellas y escribiendo reseñas. Los administradores pueden aprobar reseñas antes de que estén visibles públicamente.

---

## 🚀 Funcionalidades

- Registro e inicio de sesión de usuarios con Laravel Breeze.
- Listado de libros con sus respectivas:
  - Reseñas
  - Valoraciones (de 1 a 5 estrellas)
  - Autores (con posibilidad de múltiples autores)
- Búsqueda de libros por nombre o autor.
- Sistema de roles:
  - **Usuarios lectores** pueden dejar reseñas y calificaciones.
  - **Administradores** pueden aprobar o rechazar reseñas pendientes.
- Paginación de reseñas pendientes en el panel de administrador.
- Dashboard adaptado según el tipo de usuario.
- Validaciones de formularios.
- Uso de middlewares personalizados (`is.admin`, `is.reader`).
- Componentes Blade reutilizables.
- Factories y seeders para datos de prueba.
- Estilizado con **Tailwind CSS**.

---

## 🛠 Tecnologías

- **Laravel 10**
- **Laravel Breeze** (autenticación y scaffolding)
- **Blade** (motor de plantillas)
- **MySQL** (base de datos relacional)
- **Tailwind CSS** (estilos frontend)
- **Middleware personalizado** para control de acceso
- **Eloquent** y relaciones entre modelos
- **Laravel Factories y Seeders** para datos de prueba

---

## ⚙️ Requisitos

- PHP >= 8.1
- Composer
- MySQL
- Node.js y NPM
- Laravel CLI

---

## 🧪 Instalación

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/larateca.git
   cd larateca
   ```

2. **Instala dependencias PHP y JS:**
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Crea el archivo .env:**
   ```bash
   cp .env.example .env
   ```

4. **Crea la base de datos:**
   ```sql
   CREATE DATABASE larateca;
   ```
   > Puedes usar phpMyAdmin, MySQL Workbench, o línea de comandos de MySQL.

5. **Configura las variables de entorno (.env), especialmente la base de datos:**
   ```env
   DB_DATABASE=larateca
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Genera la key de aplicación:**
   ```bash
   php artisan key:generate
   ```

6. **Ejecuta las migraciones y los seeders:**
   ```bash
   php artisan migrate --seed
   ```

7. **Inicia el servidor de desarrollo:**
   ```bash
   php artisan serve
   ```

---

## 👤 Usuarios de prueba

### Administrador por defecto
- **Name:** Admin
- **Email:** admin@example.com
- **Password:** password
- **Campo `is_admin`:** 1

> **Nota:** Los seeders y factories crean múltiples usuarios lectores, pero solo **un administrador** con el email anterior. Para crear administradores adicionales, puedes:
> 1. Registrar un usuario normalmente desde la aplicación
> 2. Cambiar el campo `is_admin` de `0` a `1` en tu gestor de base de datos (phpMyAdmin, MySQL Workbench, etc.)

### Lectores
Los factories generan automáticamente 19 usuarios lectores para realizar pruebas de reseñas y calificaciones. Cada usuario tiene:
- Nombre y email únicos generados con Faker
- Password por defecto: `password`
- Campo `is_admin`: `false`

---

## 🧹 Comandos útiles

```bash
# Limpia cachés
php artisan optimize:clear

# Reinicia la base de datos con datos de prueba, ejecutando los seeders
php artisan migrate:fresh --seed

# Compila Tailwind CSS y JS
npm run build

```

---

## 📁 Estructura del proyecto

```
larateca/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   └── js/
└── routes/
    └── web.php
```

---

## 🎯 Seeder y Factories incluidos

El proyecto utiliza el `DatabaseSeeder` principal junto con factories para generar datos de prueba:

### DatabaseSeeder
Seeder principal que coordina la creación de todos los datos:

```php
<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1 Administrador
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        // 19 Usuarios lectores
        User::factory(19)->create();

        // 50 Libros con sus relaciones:
        // - 3 autores por libro
        // - 2 géneros por libro  
        // - 10 reseñas por libro
        Book::factory(50)
            ->has(Author::factory(3))
            ->has(Genre::factory(2))
            ->has(Review::factory(10))
            ->create();
    }
}
```

### Factories principales

El proyecto incluye factories completas para todos los modelos:

- **UserFactory**: Genera usuarios con datos realistas
- **BookFactory**: Crea libros con títulos, descripciones, imágenes y metadatos
- **AuthorFactory**: Genera autores con nombres y biografías
- **GenreFactory**: Crea géneros literarios variados
- **ReviewFactory**: Genera reseñas con calificaciones de 1-5 estrellas y estado de aprobación aleatorio

---

## 📸 Capturas de pantalla

*Próximamente se agregarán capturas del dashboard, listado de libros, sistema de reseñas, etc.*

---

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

---

## 📝 Notas de desarrollo

- Asegúrate de mantener tu archivo `.env` privado y nunca lo subas al repositorio.
- Para production, configura adecuadamente las variables de entorno.
- Los middlewares personalizados están ubicados en `app/Http/Middleware/`.
- Las validaciones de formularios se encuentran en los controladores correspondientes.
- **Gestión de administradores:** Para convertir un usuario regular en administrador, cambia el campo `is_admin` de `0` a `1` en la base de datos usando tu gestor preferido (phpMyAdmin, MySQL Workbench, etc.).

---

## 📄 Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).

---

**Desarrollado con ❤️ por Héctor Andrés González Mora**
