# Imagen base
FROM node:14 AS builder

# Directorio de trabajo
WORKDIR /app

# Copia los archivos necesarios
COPY package*.json ./

# Instala dependencias y construye el frontend
RUN npm install && npm run build

# Imagen base para el servidor Laravel
FROM php:7.4-cli

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copia los archivos del proyecto
COPY . /app
COPY --from=builder /app/dist /app/public

# Instala dependencias de Composer
RUN composer install

# Comando para optimizar Laravel
RUN php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force

# Exponer el puerto 8000
EXPOSE 8000

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
