# Sistema de gestión de clientes

## Detalles

**Herramientas**

- PHP 8
- MySQL
- Docker
- Materialize

**Instalación**

1. Clonar el repositorio

```bash
git clone https://github.com/emiperez997/clients-system
```

2. Ingresar a la carpeta del proyecto

```bash
cd clients-system
```

3. Ejectuar el contenedor de Docker

```bash
docker-compose up -d
```

4. Crear las tablas que están declaradas en `db.sql`

5. Ingresar a la aplicación en el navegador

```bash
php -S localhost:8000 -t public
```

## Características

- [ x ] Login y Registro
- [ x ] Sistema de permisos
- [ x ] CRUD de clientes
- [ x ] CRUD de usuarios
- [ x ] Arquitectura MVC
