#!/bin/bash

# Datos de conexión
USER="root"
HOST="127.0.0.1"
PORT="3306"
SQL_FILE="db_tpe.sql"
DB_NAME="db_tpe"

# Ruta absoluta al ejecutable mysql de XAMPP
MYSQL="/c/xampp/mysql/bin/mysql.exe"

# Paso 1: Eliminar la base de datos si ya existe
echo "Eliminando base de datos '$DB_NAME' si existe..."
"$MYSQL" -h "$HOST" -P "$PORT" -u "$USER" -e "DROP DATABASE IF EXISTS $DB_NAME;"

# Paso 2: Crear e importar la nueva base de datos
echo "Creando e importando base de datos '$DB_NAME'..."
"$MYSQL" -h "$HOST" -P "$PORT" -u "$USER" < "$SQL_FILE"

# Verificación
if [ $? -eq 0 ]; then
  echo "Base de datos '$DB_NAME' creada e importada correctamente."
else
  echo "Error al crear/importar la base de datos."
fi
