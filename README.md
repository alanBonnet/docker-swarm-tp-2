# docker-swarm-tp-2

## Despliegue de la Aplicación en Docker Swarm

Este repositorio contiene un archivo docker-compose.yml que configura y despliega una aplicación web compuesta por tres servicios en un entorno Docker Swarm. La aplicación incluye un servicio Apache PHP y un servicio Node.js, ambos respaldados por una base de datos MySQL.

## Requisitos Previos

Asegúrate de tener Docker y Docker Compose instalados en tu sistema.

Instrucciones de Uso

# 1: Clonar el Repositorio
Clona este repositorio en tu máquina local:
```bash
git clone https://github.com/alanBonnet/docker-swarm-tp-2.git
```

```bash
cd docker-swarm-tp-2
```

# 2: Crear la Imagen de Docker para el Servicio Node.js
Primero, debes construir la imagen de Docker para el servicio Node.js. Dirígete al directorio /node-datos y ejecuta el siguiente comando:

```bash
docker build -t nodejs-app ./node-datos
```

Esto creará una imagen de Docker llamada nodejs-app basada en el Dockerfile presente en ese directorio.

# 3: Desplegar la Aplicación en Swarm

Tener iniciado swarm:
```bash
docker swarm init
```

Ejecuta el siguiente comando para desplegar la aplicación en un clúster de Docker Swarm:

```bash
docker stack deploy -c docker-compose.yml myapp
```

Nota: Reemplaza myapp con el nombre que desees para tu servicio.

# 4. Acceder a la Aplicación

Una vez que la aplicación esté desplegada, puedes acceder a ella a través de los siguientes endpoints:

- Servicio Apache PHP: Puedes acceder a la aplicación PHP en http://localhost:8080. Este servicio muestra una lista de alumnos y permite insertar nuevos registros.

- Servicio Node.js: Puedes acceder a la aplicación Node.js en http://localhost:8090. Este servicio muestra una lista de alumnos y también permite insertar nuevos registros.

# Detener y Limpiar los Contenedores

Para detener y eliminar los servicios de Docker Swarm, ejecuta el siguiente comando:

```bash
docker stack rm myapp
```

Esto detendrá y eliminará todos los servicios de la aplicación.

# Eliminar la Imagen de Docker
Una vez que hayas detenido y eliminado los servicios, puedes eliminar la imagen de Docker que creamos en el Paso 2. Para hacerlo, ejecuta el siguiente comando:

```bash
docker rmi nodejs-app
```

Estructura del Proyecto

## Estructura del Proyecto

- docker-compose.yml: Archivo de configuración de Docker Compose que define los servicios de la aplicación y su configuración.

- apache-datos/, node-datos/, mysql-datos/: Directorios que contienen datos persistentes para los servicios.

## Notas Adicionales

- Los servicios Apache y Node.js están configurados para escuchar en los puertos 8080 y 8090, respectivamente, en el host local.

¡Disfruta de tu aplicación desplegada en Docker Swarm!
