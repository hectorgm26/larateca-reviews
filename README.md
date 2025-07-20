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
   npm install && npm run build
   ```

3. **Crea el archivo .env:**
   ```bash
   cp .env.example .env
   ```

4. **Configura las variables de entorno (.env), especialmente la base de datos:**
   ```env
   DB_DATABASE=larateca
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Genera la key de aplicación:**
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

### Administrador
- **Email:** admin@larateca.test
- **Password:** password

### Lector
- **Email:** lector@larateca.test
- **Password:** password

> Estos usuarios son creados automáticamente por los seeders durante la instalación.

---

## 🧹 Comandos útiles

```bash
# Limpia cachés
php artisan optimize:clear

# Reinicia la base de datos con datos de prueba
php artisan migrate:fresh --seed

# Compila Tailwind CSS y JS
npm run build

# Crear un nuevo seeder
php artisan make:seeder NombreSeeder

# Ejecutar un seeder específico
php artisan db:seed --class=NombreSeeder
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

## 🎯 Seeders incluidos

El proyecto incluye seeders para generar datos de prueba:

### UserSeeder
Crea usuarios de ejemplo con roles específicos:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@larateca.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Lector de prueba
        User::create([
            'name' => 'Lector Ejemplo',
            'email' => 'lector@larateca.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'reader',
        ]);

        // Lectores adicionales usando factory
        User::factory(10)->create([
            'role' => 'reader',
        ]);
    }
}
```

### BookSeeder
Genera libros de ejemplo con autores:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Crear autores
        $authors = [
            'Gabriel García Márquez',
            'Isabel Allende',
            'Mario Vargas Llosa',
            'Julio Cortázar',
            'Jorge Luis Borges',
        ];

        foreach ($authors as $authorName) {
            Author::create(['name' => $authorName]);
        }

        // Crear libros usando factories
        Book::factory(20)->create();
    }
}
```

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

---

## 📄 Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).

---

**Desarrollado con ❤️ por [Héctor Andrés González Mora](https://github.com/tu-usuario)**
