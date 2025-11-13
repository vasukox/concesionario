# Ejecutar la aplicación mediante Docker

Estos archivos permiten ejecutar tu app PHP dentro de un contenedor (Apache + PHP) y una base de datos MySQL para pruebas locales o desplegar en una plataforma que acepte contenedores (Render, Railway, etc.).

Archivos añadidos:
- `Dockerfile` — imagen basada en `php:8.1-apache` con extensiones necesarias (pdo_mysql, gd, zip).
- `docker-compose.yml` — orquesta `app` + `db` (MySQL) + `phpmyadmin`.
- `.dockerignore` — evitar subir archivos innecesarios al build context.

Cómo ejecutar localmente
1. Asegúrate de tener Docker y Docker Compose instalados.
2. Desde la raíz del proyecto ejecuta:

```powershell
docker compose up --build
```

3. Abre en el navegador:
- App: http://localhost:8080/
- phpMyAdmin: http://localhost:8081/ (user: `root`, password: `example`)

Crear la tabla necesaria para la aplicación
Puedes crear la tabla `vehiculos` en la base de datos `concesionario_db` (usa phpMyAdmin o la consola MySQL). SQL de ejemplo:

```sql
CREATE TABLE IF NOT EXISTS vehiculos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  modelo VARCHAR(100),
  fabricante VARCHAR(100),
  pais VARCHAR(100),
  precio DECIMAL(10,2) DEFAULT 0,
  descripcion TEXT,
  calificacion INT DEFAULT 5,
  imagen VARCHAR(255),
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Desplegar en una plataforma que acepte Docker (ej. Render)
1. Subir repo a GitHub (ya está subido).
2. En Render: crear nuevo servicio -> Web Service -> seleccionar "Dockerfile" -> conectar con GitHub y seleccionar la rama `master`.
3. Añadir variables de entorno en Render (Settings): `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS` si necesitas apuntar a una base de datos administrada por Render o externa.

Notas
- En producción no uses la contraseña `example` ni la base de datos integrada; usa una base de datos externa (PlanetScale, AWS RDS, ClearDB) y configura las variables de entorno en la plataforma.
