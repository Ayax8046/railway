# Imagen base para construir el frontend
FROM node:14 AS builder

# Directorio de trabajo
WORKDIR /app

# Copia los archivos necesarios para la construcción del frontend
COPY package*.json ./

# Instala dependencias y construye el frontend
RUN npm install && npm run build

# Imagen base para el servidor Laravel
FROM php:8.2-cli

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

# Copia los archivos del frontend construido al directorio público de Laravel
COPY --from=builder /public/build /public/build

# Instala dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Optimiza y cachea la configuración de Laravel
RUN php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force

# Exponer el puerto 8000
EXPOSE 8000

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
