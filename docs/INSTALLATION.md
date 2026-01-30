# Guía de Instalación Detallada

## 📋 Tabla de Contenidos
1. [Requisitos Previos](#requisitos-previos)
2. [Instalación Paso a Paso](#instalación-paso-a-paso)
3. [Configuración de Base de Datos](#configuración-de-base-de-datos)
4. [Problemas Comunes](#problemas-comunes)
5. [Verificación de la Instalación](#verificación-de-la-instalación)

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

### Requerido
- **PHP 8.2 o superior** - [Descargar](https://www.php.net/downloads)
- **MySQL 8.0 o superior** - [Descargar](https://www.mysql.com/downloads/)
- **Composer** - [Descargar](https://getcomposer.org/download/)
- **Node.js 18+** - [Descargar](https://nodejs.org/)
- **Git** - [Descargar](https://git-scm.com/)

### Verificar Instalación

```bash
php --version
mysql --version
composer --version
node --version
npm --version
git --version
```

---

## Instalación Paso a Paso

### 1. Clonar el Repositorio

```bash
git clone https://github.com/tu-usuario/adminlte-dashboard.git
cd adminlte-dashboard
```

### 2. Instalar Dependencias PHP

```bash
composer install
```

**Esto instalará:**
- Laravel framework
- AdminLTE package
- Dependencias adicionales

### 3. Configurar Variables de Entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar la Base de Datos

Edita el archivo `.env` y configura:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adminlte
DB_USERNAME=root
DB_PASSWORD=
```

**Si usas XAMPP/WAMP sin contraseña, déjalo así.**

### 5. Crear la Base de Datos

Opción 1 - Con MySQL CLI:
```bash
mysql -u root -e "CREATE DATABASE adminlte;"
```

Opción 2 - Con phpMyAdmin:
1. Abre http://localhost/phpmyadmin
2. Crea una nueva base de datos llamada `adminlte`

### 6. Ejecutar Migraciones

```bash
php artisan migrate:fresh --seed
```

**Esto creará:**
- Todas las tablas necesarias
- Datos de prueba
- Usuario admin por defecto

### 7. Instalar Dependencias Frontend

```bash
npm install
```

### 8. Compilar Assets

```bash
npm run dev
```

Para producción:
```bash
npm run build
```

### 9. Iniciar el Servidor

```bash
php artisan serve
```

Deberías ver:
```
Laravel development server started: http://127.0.0.1:8000
```

### 10. Acceder a la Aplicación

Abre tu navegador y ve a:

```
http://127.0.0.1:8000
```

---

## Credenciales de Prueba

Para acceder al dashboard:

```
Email:    admin@example.com
Password: password
```

---

## Verificación de la Instalación

Ejecuta el script de pruebas para verificar:

```bash
php docs/test_application.php
```

Deberías ver:
```
✨ ¡TODAS LAS PRUEBAS PASARON EXITOSAMENTE! ✨
Porcentaje de Éxito: 100.00%
```

---

## Problemas Comunes

### Error: "SQLSTATE[HY000]: General error: 1030"

**Causa:** Base de datos no existe o no está configurada correctamente

**Solución:**
```bash
mysql -u root -e "CREATE DATABASE adminlte;"
php artisan migrate:fresh --seed
```

### Error: "No application encryption key has been specified"

**Causa:** APP_KEY no está generado

**Solución:**
```bash
php artisan key:generate
```

### Error: npm command not found

**Causa:** Node.js no está instalado

**Solución:**
- Descarga Node.js desde https://nodejs.org/
- Reinicia tu terminal después de instalar

### Puerto 8000 ya está en uso

**Solución:**
```bash
php artisan serve --port 8001
```

Luego accede a: http://127.0.0.1:8001

### Assets CSS/JS no se cargan

**Solución:**
```bash
npm install
npm run dev
```

---

## Próximos Pasos

Después de instalar:

1. ✅ Accede al dashboard con las credenciales de prueba
2. ✅ Explora los módulos (Clientes, Productos, etc.)
3. ✅ Lee la documentación en `/docs`
4. ✅ Ejecuta las pruebas
5. ✅ Personaliza según tus necesidades

---

## Necesitas Ayuda?

- Revisa el [README.md](README.md)
- Lee el [TESTING_REPORT.md](docs/TESTING_REPORT.md)
- Abre un issue en GitHub
- Consulta la documentación de [Laravel](https://laravel.com/docs)

---

**¡Instalación Completada! 🎉**
