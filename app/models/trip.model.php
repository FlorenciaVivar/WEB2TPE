<?php
class TripModel{

    private $db; //es private xq nadie se va a conectar desde afuera

    /**
     * Constructor que establece la conexión a la base de datos.
     */
    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=db_tpe;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Obtiene todos los viajes con su aerolínea.
     *
     * @return array Lista de objetos de viajes.
     */
    public function getAll(){

        $query = $this->db->prepare("SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, a.nombre AS nombreAerolinea
        FROM viaje v
        INNER JOIN aerolinea a
        ON v.id_aerolinea_fk = a.id_aerolinea");
        $query->execute();

        $trips = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $trips;
    }

    /**
     * Obtiene un viaje según su ID.
     *
     * @param int $id ID del viaje.
     * @return object|null Objeto del viaje o null si no existe.
     */
    public function getOneTrip($id){
        
        $query = $this->db->prepare('SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, v.id_aerolinea_fk,a.nombre AS nombreAerolinea 
        FROM viaje v 
        INNER JOIN aerolinea a 
        ON v.id_aerolinea_fk = a.id_aerolinea WHERE v.id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Inserta un nuevo viaje.
     *
     * @param string $destino
     * @param string $fecha
     * @param float $precio
     * @param string $imagenViaje
     * @param string $descripcionDestino
     * @param int $id_aerolinea_fk
     * @return int ID del nuevo viaje.
     * @throws Exception si falla la carga de imagen.
     */
    public function insert($destino, $fecha, $precio, $imagenViaje, $descripcionDestino, $id_aerolinea_fk)
    {
        $pathImg = $this->uploadImage($imagenViaje);
        if (!$pathImg) {
            throw new Exception("Error al subir la imagen del viaje.");
        }
        $query = $this->db->prepare("INSERT INTO viaje (destino, fecha, precio, imagenViaje, descripcionDestino, id_aerolinea_fk) VALUES (?,?,?,?,?,?)");
        $query->execute([$destino, $fecha, $precio, $pathImg, $descripcionDestino, $id_aerolinea_fk]);
        return $this->db->lastInsertId();
    }

    /**
     * Elimina un viaje por su ID.
     *
     * @param int $id ID del viaje a eliminar.
     * @return void
     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM viaje WHERE id = ?');
        $query->execute([$id]);
    }

    /**
     * Actualiza los datos de un viaje existente.
     *
     * @param int $id ID del viaje.
     * @param string $destino
     * @param string $fecha
     * @param float $precio
     * @param string $imagenViaje Archivo de imagen.
     * @param string $descripcionDestino
     * @param int $airline ID de la aerolínea.
     * @return bool True si se actualizó correctamente.
     * @throws Exception Si falla la carga de la imagen.
     */
    public function editTripModel($id, $destino, $fecha, $precio, $imagenViaje, $descripcionDestino, $airline)
    {
        $pathImg = $this->uploadImage($imagenViaje);
        if (!$pathImg) {
            throw new Exception("Error al subir la nueva imagen del viaje.");
        }
        $query = $this->db->prepare("UPDATE viaje SET destino=?, fecha=?, precio=?, imagenViaje=?, descripcionDestino=?, id_aerolinea_fk=? WHERE id=?");
        return $query->execute([$destino, $fecha, $precio, $pathImg, $descripcionDestino, $airline, $id]);

    }

    /**
     * Obtiene todos los viajes filtrados por aerolínea.
     *
     * @param int $id ID de la aerolínea.
     * @return array Lista de viajes.
     */
    public function getTripsByAirlinesModel($id){
        $query = $this->db->prepare('SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, a.nombre AS nombreAerolinea 
        FROM viaje v 
        INNER JOIN aerolinea a 
        ON v.id_aerolinea_fk = a.id_aerolinea WHERE id_aerolinea_fk=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Sube una imagen a la carpeta de viajes.
     *
     * @param string $imagenViaje Ruta temporal del archivo subido.
     * @return string|null Ruta del archivo guardado o null si falla.
     */
    private function uploadImage($imagenViaje)
    {
        $target = 'imgs/viajes/' . uniqid() . '.jpg';
        if (move_uploaded_file($imagenViaje, $target)) {
            return $target;
        }
        return null;
    }

}
