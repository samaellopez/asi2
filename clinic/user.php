<?php
/** Clase Usuarios
 * Servicio para manejar usuarios.
 * TODO: 
 *    [] Metodo para crear nuevo usuario
 *    [] Metodo para validar usuario
 * */
class User
{
  protected $db;            // Conexion a base de datos
  protected $user;          // Usuario en la BD
  protected $password;      // Contraseña en plain text
  protected $status;        // Estado del usuario
  protected $role;          // Rol del sistema

  protected $user_data;     // Almacena la data del usuario

  // Metodo constructor
  public function __construct($db)
  {
    $this->db = $db;
  }

  public function create($user, $password, $role, $status)
  {
    // Creamos hash de contraseña
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = $this->db->query("INSERT INTO login (username, password, rol, estado) VALUES ('$user', '$password', '$role', '$status')");
    return $query;
  }
}
