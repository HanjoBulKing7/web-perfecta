# Tu Web Perfecta Beauty
Esta página  se encarga de procesar pagos con tarjeta usando el servicio [Stripe](https://docs.stripe.com/api) hasta ahora.
Más delante va a implementar nuevas funciones como una página web completa para ayudar a satisfacer las necesidades de un negocio. 


# 🚀 Instalación y Configuración del Proyecto Laravel

## 📋 Requisitos Previos
- PHP 8.0 o superior
- Composer ([Descargar aquí](https://getcomposer.org/download/))
- Node.js (opcional, si el proyecto usa npm)
- Servidor de base de datos (MySQL, PostgreSQL, etc.)

## 🔧 Pasos de Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```
### 2.  Instalar dependencias de PHP
```bash
composer install
```
### 3. Configurar entorno
```bash
cp .env.example .env
php artisan key:generate
```
### 4. Configurar base de datos
Edita el archivo `.env` con tus credenciales:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=usuario
DB_PASSWORD=contraseña
 ```
### 5. Ejecutar migraciones
```
php artisan migrate
```
### 6. Instalar dependencias de frontend (opcional)
```
npm install
npm run dev
```

### 7. Iniciar servidor local
```
php artisan serve
```
🔗 La aplicación estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000/)

## 📚 Documentación Adicional

-   [Documentación Oficial de Laravel](https://laravel.com/docs)
    
-   [Guía de Migraciones](https://laravel.com/docs/migrations)

 