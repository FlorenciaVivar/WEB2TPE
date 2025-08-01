<?php
class TripModel{

    private $db; //es private xq nadie se va a conectar desde afuera

    public function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
    }
       /*  TRAE TODOS LOS VIAJES */
    //podemos getAll solo ya que el redundante, los frameworks usan asi getall, insert y remove solo
    public function getAll(){

        // 1. abro conexión a la DB, ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, a.nombre AS nombreAerolinea
        FROM viaje v
        INNER JOIN aerolinea a
        ON v.id_aerolinea_fk = a.id_aerolinea");
        $query->execute();
        // 3. obtengo los resultados
        $trips = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $trips;
    }

    /*      TRAE UN VIAJE SEGUN SU ID       */
    public function getOneTrip($id){
        
        $query = $this->db->prepare('SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, v.id_aerolinea_fk,a.nombre AS nombreAerolinea 
        FROM viaje v 
        INNER JOIN aerolinea a 
        ON v.id_aerolinea_fk = a.id_aerolinea WHERE v.id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /*     INSERTA UN VIAJE     */
    public function insert($destino, $fecha, $precio, $imagenViaje, $descripcionDestino, $id_aerolinea_fk)
    {
        $pathImg = $this->uploadImage($imagenViaje);
        $query = $this->db->prepare("INSERT INTO viaje (destino, fecha, precio, imagenViaje, descripcionDestino, id_aerolinea_fk) VALUES (?,?,?,?,?,?)");
        $query->execute([$destino, $fecha, $precio, $pathImg, $descripcionDestino, $id_aerolinea_fk]);
        return $this->db->lastInsertId(); //nos devuelve el id del último elemento insertado
    }

    /*   ELIMINA UN VIAJE SEGUN SU ID     */
    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM viaje WHERE id = ?');
        $query->execute([$id]);
        header("Location: " . BASE_URL . "trip");
    }
    /*   EDITA UN VIAJE   */
    public function editTripModel($id, $destino, $fecha, $precio, $imagenViaje, $descripcionDestino, $airline)
    {
        $pathImg = $this->uploadImage($imagenViaje);
        $query = $this->db->prepare("UPDATE viaje SET destino=?, fecha=?, precio=?, imagenViaje=?, descripcionDestino=?, id_aerolinea_fk=? WHERE id=?");
        $query->execute([$destino, $fecha, $precio, $pathImg, $descripcionDestino, $airline, $id]);
        return $this->db->lastInsertId();
    }
  
    /* TRAE TODOS LOS VIAJES SEGUN LA AEROLINEA SELECCIONADA  */
    public function getTripsByAirlinesModel($id)
    {
        $query = $this->db->prepare('SELECT v.id, v.destino, v.fecha, v.precio, v.imagenViaje, v.descripcionDestino, a.nombre AS nombreAerolinea 
        FROM viaje v 
        INNER JOIN aerolinea a 
        ON v.id_aerolinea_fk = id_aerolinea WHERE id_aerolinea_fk=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    private function uploadImage($imagenViaje)
    {
        $target = 'imgs/viajes/'.uniqid().'.jpg';
        move_uploaded_file($imagenViaje, $target);
        return $target;
    }
}
