#!/bin/bash

# Especifica la ruta de la carpeta que deseas copiar
ORIGIN_FOLDER="/ruta/a/la/carpeta/origen"

# Especifica la ruta de la carpeta de destino
DESTINATION_FOLDER="/ruta/a/la/carpeta/destino"

# Especifica el mensaje del commit como un parámetro
COMMIT_MESSAGE="$1"

# Copia la carpeta de origen a la carpeta de destino
cp -r "$ORIGIN_FOLDER" "$DESTINATION_FOLDER"

# Cambia al directorio de destino
cd "$DESTINATION_FOLDER"

# Inicializa un nuevo repositorio Git
git init

# Agrega los archivos al repositorio Git
git add .

# Realiza un commit de los cambios con el mensaje especificado por el parámetro
git commit -m "$COMMIT_MESSAGE"

# Agrega el repositorio remoto de GitHub
git remote add origin https://github.com/usuario/repositorio.git

# Sube los cambios al repositorio remoto
git push -u origin master
