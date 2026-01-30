# 🎵 AdminLTE Dashboard - Sistema de Gestión Completo

[![Laravel](https://img.shields.io/badge/Laravel-12.47.0-red?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.12-blue?style=flat-square&logo=php)](https://php.net)
[![AdminLTE](https://img.shields.io/badge/AdminLTE-3-teal?style=flat-square)](https://adminlte.io)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)

## 📝 Descripción del Proyecto

**AdminLTE Dashboard** es un sistema de gestión integral y moderno construido con **Laravel 12** y **AdminLTE 3**. Proporciona un panel de administración completo con interfaz estilo **Spotify** (tema oscuro con tonos cyan) para gestionar 5 módulos principales:

- 👥 **Clientes** - Gestión completa de clientes
- 🛍️ **Productos** - Catálogo con precios y stock
- 🏷️ **Categorías** - Organización de productos
- 📋 **Órdenes** - Sistema de órdenes con seguimiento
- 🏢 **Proveedores** - Gestión de proveedores

El sistema incluye autenticación, validaciones, relaciones de base de datos, y está completamente documentado y probado.

## 🚀 Características Principales

### 📦 Módulos CRUD Completos
- **👥 Clientes** - Gestión de clientes con datos de contacto
- **🛍️ Productos** - Catálogo de productos con precio y stock
- **🏷️ Categorías** - Organización de productos por categoría
- **📋 Órdenes** - Sistema de órdenes con seguimiento de estado
- **🏢 Proveedores** - Gestión de proveedores y contactos

### 🎨 Diseño Moderno
- Interfaz **Spotify-style** con tema oscuro
- Colores primarios: **Cyan (#00d4ff)** y **Azul (#0f7ec5)**
- Componentes responsive y adaptables
- Animaciones suaves y efectos modernos
- Diseño mobile-first

### 🔐 Seguridad
- Autenticación Laravel incluida
- Validación de formularios en servidor
- CSRF protection
- Relaciones de base de datos con integridad referencial

### 💾 Base de Datos
- 8 tablas creadas con migraciones
- Relaciones entre tablas (Órdenes → Clientes, Productos → Categorías)
- Seeds con 50+ registros de prueba
- Foreign keys con cascade delete

---

## 📋 Requisitos Previos

Para ejecutar este proyecto necesitas tener instalado:

| Requisito | Versión Mínima |
|-----------|----------------|
| **PHP** | 8.2+ |
| **MySQL** | 8.0+ |
| **Composer** | Última versión |
| **Node.js** | 18+ |
| **npm** | 9+ o **yarn** |

**Verifica tu instalación:**
```bash
php --version
mysql --version
composer --version
node --version
npm --version
```

---

## ⚡ Pasos Básicos de Instalación

### Paso 1: Clonar o descargar el proyecto

```bash
cd tu-directorio-de-proyectos
cd adminlte
```

### Paso 2: Instalar dependencias PHP

```bash
composer install
```

### Paso 3: Configurar archivo .env

```bash
cp .env.example .env
php artisan key:generate
```

Luego edita `.env` y configura la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adminlte
DB_USERNAME=root
DB_PASSWORD=
```

### Paso 4: Instalar dependencias de frontend

```bash
npm install
```

### Paso 5: Compilar assets (CSS/JS)

```bash
npm run dev
```

### Paso 6: Crear base de datos y cargar datos

```bash
php artisan migrate:fresh --seed
```

> ✅ Esto crea las tablas y carga datos de prueba automáticamente

### Paso 7: Iniciar el servidor

```bash
php artisan serve
```

### Paso 8: Acceder a la aplicación

Abre tu navegador y ve a:

```
http://127.0.0.1:8000
```

---

## 📊 Estructura de Tablas

### Clientes
```sql
- id (BigInt, PK)
- nombre (String)
- email (String, Unique)
- telefono (String, Nullable)
- ciudad (String, Nullable)
- pais (String, Nullable)
- created_at, updated_at
```

### Productos
```sql
- id (BigInt, PK)
- nombre (String)
- descripcion (Text)
- precio (Decimal 10,2)
- stock (Integer)
- created_at, updated_at
```

### Categorías
```sql
- id (BigInt, PK)
- nombre (String, Unique)
- descripcion (Text, Nullable)
- created_at, updated_at
```

### Órdenes
```sql
- id (BigInt, PK)
- cliente_id (BigInt, FK → clientes)
- numero_orden (String, Unique)
- total (Decimal 10,2)
- estado (Enum: pendiente, procesando, completada, cancelada)
- fecha_entrega (Date, Nullable)
- created_at, updated_at
```

### Proveedores
```sql
- id (BigInt, PK)
- nombre (String, Unique)
- contacto (String)
- email (String, Unique)
- telefono (String)
- ciudad (String)
- pais (String)
- created_at, updated_at
```

---

## 📁 Estructura del Proyecto

```
adminlte/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ClientesController.php
│   │       ├── ProductoController.php
│   │       ├── CategoriaController.php
│   │       ├── OrdenController.php
│   │       └── ProveedorController.php
│   └── Models/
│       ├── Clientes.php
│       ├── producto.php
│       ├── Categoria.php
│       ├── Orden.php
│       └── Proveedor.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2026_01_26_190000_create_clientes_table.php
│   │   ├── 2026_01_26_190947_create_productos_table.php
│   │   ├── 2026_01_30_000001_create_categorias_table.php
│   │   ├── 2026_01_30_000002_create_ordenes_table.php
│   │   └── 2026_01_30_000003_create_proveedores_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── ClientesSeeder.php
│       ├── ProductoSeederActualizado.php
│       ├── CategoriaSeeder.php
│       ├── ProveedorSeeder.php
│       └── OrdenSeeder.php
├── resources/
│   ├── css/
│   │   └── spotify-theme.css (400+ líneas de CSS personalizado)
│   └── views/
│       ├── clientes/ (4 vistas)
│       ├── producto/ (4 vistas)
│       ├── categoria/ (4 vistas)
│       ├── orden/ (4 vistas)
│       └── proveedor/ (4 vistas)
├── routes/
│   └── web.php (rutas RESTful)
└── config/
    └── adminlte.php (configuración del dashboard)
```

---

## 🎯 Casos de Uso

### Gestión de Clientes
- ✅ Crear nuevos clientes
- ✅ Actualizar información de contacto
- ✅ Ver detalles del cliente
- ✅ Eliminar clientes
- ✅ Listar todos los clientes

### Gestión de Productos
- ✅ Agregar productos al catálogo
- ✅ Actualizar precio y stock
- ✅ Asignar categoría a productos
- ✅ Buscar productos por nombre
- ✅ Ver disponibilidad de stock

### Gestión de Órdenes
- ✅ Crear órdenes para clientes
- ✅ Cambiar estado de orden (pendiente → procesando → completada)
- ✅ Establecer fecha de entrega
- ✅ Ver historial de órdenes del cliente
- ✅ Cancelar órdenes si es necesario

### Gestión de Proveedores
- ✅ Registrar nuevos proveedores
- ✅ Mantener datos de contacto
- ✅ Consultar historial de proveedores
- ✅ Actualizar información de contacto

---

## 🎨 Tema Visual - Spotify Style

### Paleta de Colores
```
Primary Cyan:      #00d4ff
Secondary Blue:    #0f7ec5
Background Dark:   #0f0f0f
Surface Dark:      #181818
Text Primary:      #ffffff
Accent Green:      #1db954 (Spotify Green)
```

### Componentes Estilizados
- Cards con bordes cyan y gradientes
- Botones con efectos ripple
- Tablas con headers cyan oscuro
- Inputs con focus en cyan
- Scrollbars personalizadas

---

## 🔧 Comandos Útiles

```bash
# Iniciar servidor de desarrollo
php artisan serve

# Compilar assets en desarrollo
npm run dev

# Compilar assets para producción
npm run build

# Ejecutar seeders solo
php artisan db:seed

# Hacer rollback de migraciones
php artisan migrate:rollback

# Resetear todo (cuidado!)
php artisan migrate:fresh --seed

# Tinker para pruebas interactivas
php artisan tinker

# Ver todas las rutas
php artisan route:list

# Crear un nuevo modelo con migración
php artisan make:model NombreModelo -m

# Crear un nuevo controlador
php artisan make:controller NombreController --resource
```

---

## 📈 Datos de Prueba Incluidos

### 5 Clientes Precargados
- Juan García López (Madrid)
- María Rodríguez Martínez (Barcelona)
- Carlos Fernández González (Valencia)
- Ana López Sánchez (Sevilla)
- Luis Martínez Pérez (Bilbao)

### 10 Productos Variados
- Laptops, iPhones, TVs, AirPods
- Smartwatches, mochilas, zapatillas
- Botellas térmicas, lámparas, herramientas

### 5 Categorías Principales
- Electrónica
- Ropa y Accesorios
- Hogar y Decoración
- Deporte y Fitness
- Libros y Media

### 5 Proveedores Internacionales
- Tech Supplies S.A. (Madrid)
- Global Imports Ltd. (Barcelona)
- Premium Quality Distribution (Valencia)
- Euro Logistics Partners (Sevilla)
- Innovation Factory Co. (Bilbao)

### 7 Órdenes de Muestra
- Estados variados: completada, procesando, pendiente, cancelada
- Totales entre €399 y €3,249

---

## 🧪 Validaciones Implementadas

### Clientes
- ✅ Nombre requerido
- ✅ Email único y válido
- ✅ Validación de campos opcionales

### Productos
- ✅ Nombre requerido (max 255 caracteres)
- ✅ Descripción requerida
- ✅ Precio numérico positivo
- ✅ Stock entero no negativo

### Órdenes
- ✅ Cliente debe existir
- ✅ Número de orden único
- ✅ Estado debe ser valor enum válido
- ✅ Fecha de entrega opcional pero debe ser date válida

### Categorías
- ✅ Nombre único
- ✅ Descripción opcional

### Proveedores
- ✅ Nombre único
- ✅ Email único y válido
- ✅ Contacto requerido

---

## 🚀 Despliegue a Producción

### Pasos Recomendados
1. Configurar variables de ambiente en servidor
2. Ejecutar `composer install --no-dev`
3. Ejecutar `php artisan config:cache`
4. Configurar permisos de directorios:
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```
5. Ejecutar migraciones: `php artisan migrate`
6. Compilar assets: `npm run build`
7. Configurar web server (Nginx o Apache)

---

## 📝 Licencia

Este proyecto está bajo licencia **MIT**. Ver archivo `LICENSE` para más detalles.

---

## 👨‍💻 Autor

Desarrollado con ❤️ usando Laravel y AdminLTE

**Versión:** 1.0.0  
**Fecha:** Enero 30, 2026

---

## 📞 Soporte y Contacto

Para reportar bugs o sugerencias, abre un issue en el repositorio.

---

## ✨ Mejoras Futuras

- [ ] Sistema de autenticación avanzado (2FA)
- [ ] Reportes y gráficos estadísticos
- [ ] Exportar datos a PDF/Excel
- [ ] Sistema de notificaciones por email
- [ ] API REST completa
- [ ] Panel de análisis con gráficos
- [ ] Historial de cambios y auditoría
- [ ] Sistema de permisos por rol

---

**¡Gracias por usar este sistema! 🎉**
