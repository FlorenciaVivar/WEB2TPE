<?php
class AirlineModel{

    private $db; //es private xq nadie se va a conectar desde afuera

    /**
     * Constructor. Establece la conexión a la base de datos.
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
     * Obtiene todas las aerolíneas.
     *
     * @return array Lista de objetos de aerolíneas.
     */

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM aerolinea");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAirlinesPaginated($limit, $offset) {
        $query = $this->db->prepare('SELECT * FROM aerolinea LIMIT :limit OFFSET :offset');
        $query->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $query->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $query->execute();
        // 3. obtengo los resultados
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function countAirlines() {
        $query = $this->db->prepare("SELECT COUNT(*) AS total FROM aerolinea");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->total;
    }

    /**
     * Obtiene una aerolínea por su ID.
     *
     * @param int $id_aerolinea
     * @return object Objeto aerolínea .
     */
    public function getOneAirline($id_aerolinea)
    {
        $query = $this->db->prepare('SELECT * FROM aerolinea WHERE id_aerolinea=?');
        $query->execute([$id_aerolinea]);
        $airline = $query->fetch(PDO::FETCH_OBJ);
        return $airline;
    }

    /**
     * Inserta una nueva aerolínea.
     *
     * @param string $nombre Nombre de la aerolínea.
     * @param string $imagenAerolinea Ruta temporal del archivo.
     * @return int ID de la aerolínea insertada.
     * @throws Exception si falla la carga de imagen.
     */
    public function insertAirline($nombre, $imagenAerolinea)
    {
        $pathImg = $this->uploadImage($imagenAerolinea);
        if (!$pathImg) {
            throw new Exception("Error al subir la imagen de la aerolínea.");
        }
        $query = $this->db->prepare("INSERT INTO aerolinea (nombre, imagenAerolinea) VALUES (?,?)");
        $query->execute([$nombre, $pathImg]);
        return $this->db->lastInsertId(); //nos devuelve el id del último elemento insertado
    }

    /**
     * Elimina una aerolínea por su ID.
     *
     * @param int $id ID de la aerolínea.
     * @return void
     */
    public function deleteAirlineModel($id)
    {
        $query = $this->db->prepare('DELETE FROM aerolinea WHERE id_aerolinea = ?');
        $query->execute([$id]);
    }

    /**
     * Edita una aerolínea existente.
     *
     * @param int $id_aerolinea ID de la aerolínea.
     * @param string $nombre Nuevo nombre.
     * @param string|null $imagenAerolinea Nueva imagen (opcional).
     * @return void
     */
    public function editAirlineModel($id_aerolinea, $nombre, $imagenAerolinea = null)
    {
        if ($imagenAerolinea) {
            $pathImg = $this->uploadImage($imagenAerolinea);
            $query = $this->db->prepare("UPDATE aerolinea SET nombre=?, imagenAerolinea=? WHERE id_aerolinea=?");
            $query->execute([$nombre, $pathImg, $id_aerolinea]);
        } else {
            $query = $this->db->prepare("UPDATE aerolinea SET nombre=? WHERE id_aerolinea=?");
            $query->execute([$nombre, $id_aerolinea]);
        }
    }

    /**
     * Sube una imagen al servidor.
     *
     * @param string $imagenAerolinea Ruta temporal del archivo.
     * @return string|null Ruta final del archivo o null si falla.
     */
    private function uploadImage($imagenAerolinea)
    {
        $target = 'imgs/aerolineas/' . uniqid() . '.jpg';
        if(move_uploaded_file($imagenAerolinea, $target)){
            return $target;
        } else {
            return null;
        }
    }


}
