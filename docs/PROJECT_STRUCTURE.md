# Estructura del Proyecto

```
adminlte-dashboard/
│
├── 📄 README.md                    ← Documentación principal
├── 📄 LICENSE                      ← Licencia MIT
├── 📄 CONTRIBUTING.md              ← Guía de contribuciones
├── 📄 CHANGELOG.md                 ← Historial de cambios
├── 📄 .env.example                 ← Variables de entorno ejemplo
├── 📄 .gitignore                   ← Archivos ignorados por Git
├── 📄 composer.json                ← Dependencias PHP
├── 📄 package.json                 ← Dependencias Node/NPM
├── 📄 vite.config.js               ← Configuración de Vite
├── 📄 phpunit.xml                  ← Configuración de tests
├── 📄 artisan                      ← CLI de Laravel
│
├── 📁 app/                         ← Código de la aplicación
│   ├── Http/
│   │   ├── Controllers/            ← Controladores
│   │   │   ├── ClientesController.php
│   │   │   ├── ProductoController.php
│   │   │   ├── CategoriaController.php
│   │   │   ├── OrdenController.php
│   │   │   └── ProveedorController.php
│   │   └── Middleware/
│   ├── Models/                     ← Modelos Eloquent
│   │   ├── Clientes.php
│   │   ├── producto.php
│   │   ├── Categoria.php
│   │   ├── Orden.php
│   │   ├── Proveedor.php
│   │   └── User.php
│   ├── Providers/                  ← Service Providers
│   │   └── AppServiceProvider.php
│   └── View/
│       └── Components/             ← Componentes Vue/Blade
│
├── 📁 bootstrap/                   ← Bootstrap de Laravel
│   ├── app.php
│   └── cache/
│
├── 📁 config/                      ← Configuración de la app
│   ├── adminlte.php               ← Config de AdminLTE
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
│
├── 📁 database/                    ← Base de datos
│   ├── migrations/                 ← Migraciones
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2026_01_26_190000_create_clientes_table.php
│   │   ├── 2026_01_26_190947_create_productos_table.php
│   │   ├── 2026_01_30_000001_create_categorias_table.php
│   │   ├── 2026_01_30_000002_create_ordenes_table.php
│   │   └── 2026_01_30_000003_create_proveedores_table.php
│   ├── factories/                  ← Factories
│   │   └── UserFactory.php
│   └── seeders/                    ← Seeders
│       ├── DatabaseSeeder.php
│       ├── ClientesSeeder.php
│       ├── ProductoSeederActualizado.php
│       ├── CategoriaSeeder.php
│       ├── ProveedorSeeder.php
│       └── OrdenSeeder.php
│
├── 📁 docs/                        ← Documentación
│   ├── INSTALLATION.md             ← Guía detallada de instalación
│   ├── TESTING_REPORT.md           ← Informe de pruebas
│   ├── INDEX.md                    ← Índice de archivos
│   ├── test_application.php        ← Suite de pruebas
│   ├── backup_database.php         ← Script de backup
│   └── database_backup_*.sql       ← Backup SQL
│
├── 📁 lang/                        ← Traducciones
│   └── vendor/
│       └── adminlte/
│
├── 📁 public/                      ← Archivos públicos
│   ├── index.php                   ← Punto de entrada
│   ├── robots.txt
│   ├── hot                         ← Archivo Vite HMR
│   ├── vendor/                     ← Assets de librerías
│   │   ├── adminlte/
│   │   ├── bootstrap/
│   │   ├── fontawesome-free/
│   │   ├── jquery/
│   │   ├── overlayScrollbars/
│   │   └── popper/
│   └── build/                      ← Assets compilados
│
├── 📁 resources/                   ← Recursos
│   ├── css/
│   │   ├── app.css
│   │   └── spotify-theme.css       ← Tema personalizado
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   ├── sass/
│   │   ├── _variables.scss
│   │   └── app.scss
│   └── views/                      ← Vistas Blade
│       ├── home.blade.php
│       ├── auth/
│       ├── clientes/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── producto/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── categoria/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── orden/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── proveedor/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       └── vendor/
│           └── adminlte/
│
├── 📁 routes/                      ← Definición de rutas
│   ├── web.php                     ← Rutas web
│   └── console.php                 ← Comandos console
│
├── 📁 storage/                     ← Almacenamiento
│   ├── app/
│   │   ├── public/
│   │   └── private/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   └── views/
│   └── logs/
│
├── 📁 tests/                       ← Tests
│   ├── TestCase.php
│   ├── Feature/
│   │   └── ExampleTest.php
│   └── Unit/
│       └── ExampleTest.php
│
├── 📁 vendor/                      ← Dependencias PHP (no incluidas en Git)
│   └── ...
│
└── 📁 node_modules/                ← Dependencias NPM (no incluidas en Git)
    └── ...
```

## 📁 Estructura de Directorios Importantes

### `/app` - Código de la Aplicación
- **Controllers**: Lógica de las rutas
- **Models**: Modelos Eloquent ORM
- **Providers**: Proveedores de servicios

### `/database` - Base de Datos
- **migrations**: Scripts de creación de tablas
- **seeders**: Scripts para poblar datos
- **factories**: Generadores de datos de prueba

### `/resources` - Frontend
- **views**: Plantillas Blade (HTML)
- **css**: Estilos CSS y SCSS
- **js**: JavaScript de la aplicación

### `/routes` - Enrutamiento
- **web.php**: Rutas HTTP principales

### `/docs` - Documentación
- Scripts de prueba y backup
- Reportes detallados
- Guías de instalación

### `/public` - Acceso Público
- `index.php`: Punto de entrada
- Assets compilados
- Librerías externas

---

## 📊 Módulos de la Aplicación

```
Clientes/
├── Model: Clientes.php
├── Controller: ClientesController.php
└── Views: clientes/[index, create, edit, show].blade.php

Productos/
├── Model: producto.php
├── Controller: ProductoController.php
└── Views: producto/[index, create, edit, show].blade.php

Categorías/
├── Model: Categoria.php
├── Controller: CategoriaController.php
└── Views: categoria/[index, create, edit, show].blade.php

Órdenes/
├── Model: Orden.php
├── Controller: OrdenController.php
└── Views: orden/[index, create, edit, show].blade.php

Proveedores/
├── Model: Proveedor.php
├── Controller: ProveedorController.php
└── Views: proveedor/[index, create, edit, show].blade.php
```

---

## 🔄 Flujo de Datos

```
User Request
    ↓
routes/web.php (Definir ruta)
    ↓
Controller (Procesar lógica)
    ↓
Model (Interactuar con BD)
    ↓
Database (Almacenar/recuperar datos)
    ↓
View (Renderizar HTML)
    ↓
Browser Response
```

---

## 📦 Dependencias Principales

### PHP (composer.json)
- laravel/framework: Framework web
- jeroennoten/laravel-adminlte: Template AdminLTE
- Eloquent ORM: Base de datos

### Frontend (package.json)
- Vite: Build tool
- Bootstrap: Framework CSS
- jQuery: Librería JavaScript
- Font Awesome: Iconos

---

**Estructura Estándar Laravel + AdminLTE optimizada para GitHub** ✅
