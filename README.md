# API de Restaurantes 🍽️

Este proyecto es una API RESTful construida con Laravel y documentada con Scramble. Incluye autenticación por API Key y está lista para ejecutarse fácilmente usando Docker.

> ⚠️ Este proyecto **usa imágenes oficiales de Bitnami** para PHP, MySQL y otros servicios, por lo que **no incluye un Dockerfile personalizado**. Todo se levanta directamente desde `docker-compose.yml`.

---

## 🚀 Requisitos

- Docker
- Docker Compose
- Git

---

## ⚙️ Instalación paso a paso

### 1. Clona el repositorio

```bash
git clone https://github.com/DarioSoto97/api-restaurante
cd api-restaurante
```

### 2. Levantar los conetendores

```bash
docker compose up -d
```
Esto iniciará los servicios necesarios (PHP, MySQL, etc.) usando imágenes de Bitnami.

### 3. Crea el archivo de entorno (.env)

Laravel necesita un archivo llamado .env para cargar la configuración del entorno (conexión a base de datos, clave de la app, puertos, API keys, etc.).

Para crearlo, simplemente copia el archivo de ejemplo incluido en el proyecto:
```bash
cp .env.example .env
```
Este paso crea tu archivo .env personal con valores por defecto que luego puedes modificar.

### 4. Genera la clave de la aplicación
```bash
docker compose exec app php artisan key:generate
```
Esto generará una clave única de seguridad para Laravel y la escribirá automáticamente en tu archivo .env.

### 5. Añade tu API Key al .env

Abre el archivo .env en tu editor de texto favorito y añade una línea como esta (puedes cambiar el valor):
```bash
API_KEY=123456789abcdef
```
  Esta clave será necesaria para acceder a los endpoints protegidos de la API. Deberás incluirla en cada petición como encabezado.

### 6. Ejecuta las migraciones
```bash
docker compose exec app php artisan migrate
```
Esto creará las tablas necesarias en la base de datos MySQL para que la aplicación funcione.

## 📚 Documentación de la API

Una vez todo esté en marcha, accede a:

http://localhost/docs/api

Aquí podrás explorar todos los endpoints, ver ejemplos y probarlos directamente desde el navegador gracias a Scramble.
## 🔐 Autenticación por API Key

Para acceder a los endpoints protegidos, deberás enviar un encabezado como este en tus peticiones HTTP:

Authorization: Bearer 123456789abcdef (Suponiendo que 123456789abcdef sea tu API Key)

Puedes probar esta autenticación directamente desde la documentación (/docs/api) usando el botón "Authorize".

## ✅ Endpoints disponibles

| Método  | Ruta                          | Descripción                   |
|---------|-------------------------------|-------------------------------|
| GET     | `/api/restaurantes`          | Lista de restaurantes         |
| GET     | `/api/restaurantes/{id}`     | Ver un restaurante por ID     |
| POST    | `/api/restaurantes`          | Crear un nuevo restaurante    |
| PUT     | `/api/restaurantes/{id}`     | Actualizar restaurante completo |
| PATCH   | `/api/restaurantes/{id}`     | Actualización parcial         |
| DELETE  | `/api/restaurantes/{id}`     | Eliminar restaurante          |


## 🛠️ Herramientas usadas

- Laravel

- Docker & Docker Compose

- Imágenes oficiales de Bitnami

- MySQL

- Scramble (para la documentación OpenAPI)


