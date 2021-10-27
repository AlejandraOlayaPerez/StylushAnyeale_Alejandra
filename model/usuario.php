<?php
require_once 'conexiondb.php';

class usuario
{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacenara el id del usuario en la base de datos
    private $idUser = 0;
    public $idRol = "";
    public $idCargo = "";
    public $tipoDocumento = "";
    public $documentoIdentidad = "";
    public $primerNombre = "";
    public $segundoNombre = "";
    public $primerApellido = "";
    public $segundoApellido = "";
    public $fechaNacimiento = "";
    public $correoElectronico = "";
    public $contrasena = "";
    public $telefono = "";
    public $genero = "";
    public $estadoCivil = "";
    public $direccion = "";
    public $barrio = "";
    public $imgBiografia = "";
    public $imgPerfil = "";
    public $numRegistro = "";
    public $numPagina = "";
    public $eliminado = "";

    //estas funciones permitian obtener la informacion de la variable privada
    //funcion get: para obtener o capturar la informacion de la variable, idUser y nombre
    //funcion set: para configurar la informacion de la variable
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getNombreUser()
    {
        return $this->primerNombre;
    }

    public function setIdUsers($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre . " " . $this->primerApellido;
    }
    //funcion que gestiona el registro de los usuarios
    //las variables dentro de los parentesis son parametros que se requieren al utilizar la funcion

    //esta funcion me trae un usuario diferente a su propio ID pero con igual tipoDocumento y documento Identidad
    function documentoIdUsuario()
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario WHERE tipoDocumento='$this->tipoDocumento' AND documentoIdentidad=$this->documentoIdentidad";

        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    public function documentoIdUsuarioExiste($idUser, $tipoDocumento, $documentoIdentidad)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario WHERE idUser!=$idUser AND tipoDocumento='$tipoDocumento' AND documentoIdentidad=$documentoIdentidad";

        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

  
    public function nuevoUsuario()
    {
        //funcion para encriptar la contraseña utilizando el metodo md5
        $this->contrasena = md5($this->contrasena);
        //instancia la clase conecta 
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //se crea la sentencia sql para registrar el usuario
        $sql = "INSERT INTO usuario (idRol, idCargo, tipoDocumento, documentoIdentidad, primerNombre, segundoNombre, primerApellido, segundoApellido,
        fechaNacimiento, correoElectronico, contrasena, telefono, genero, estadoCivil, direccion, barrio, eliminado) 
        VALUES ($this->idRol, $this->idCargo, '$this->tipoDocumento', $this->documentoIdentidad, '$this->primerNombre', '$this->segundoNombre', '$this->primerApellido', 
        '$this->segundoApellido', '$this->fechaNacimiento', '$this->correoElectronico', '$this->contrasena', $this->telefono, '$this->genero', 
        '$this->estadoCivil', '$this->direccion', '$this->barrio', false)";

        //ejecuta secuencia, solo cuando es insert.
        $result = mysqli_query($conexion, $sql);

        //funcion para retornar el ultimo id creado
        $sql="SELECT (LAST_INSERT_ID()) as idUser FROM usuario";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro){
            $this->idUser=$registro['idUser'];
        }
        // echo $sql;
        return $result;
    }

    public function consultarCorreoElectronico($correoElectronico)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que nos permite conocer la existencia de un correo electronico
        $sql = "SELECT * FROM usuario WHERE  correoElectronico='$correoElectronico'";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach ($result as $registro) {
            $this->idUser = $registro['idUser'];
            $this->correoElectronico = $registro['correoElectronico'];
        }

        return count($result);
    }

    public function consultarContrasena($idUser, $contrasena)
    {
        $contrasena = md5($contrasena);
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que nos permite conocer la existencia de un correo electronico
        $sql = "SELECT * FROM usuario WHERE idUser=$idUser AND contrasena='$contrasena'";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach ($result as $registro) {
            $this->contrasena = $registro['contrasena'];
        }

        return count($result);
    }



    public function consultarCorreoElectronicoExiste($correoElectronico, $idUser)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que nos permite conocer la existencia de un correo electronico
        $sql = "SELECT * FROM usuario WHERE idUser!=$idUser AND  correoElectronico='$correoElectronico'";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach ($result as $registro) {
            $this->idUser = $registro['idUser'];
            $this->correoElectronico = $registro['correoElectronico'];
        }

        return count($result);
    }

    function comprobarEliminado($habilitar, $idUser)
    { //recibe las variables como parametros.
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        if ($habilitar == true) {
            //esta condicion se ejecuta si habilitado es verdadero. 
            $sql = "UPDATE usuario SET habilitar=0 WHERE idUser=$idUser";
        } else {
            //esta condicion se ejecuta si habilitado es falso.
            $sql = "UPDATE usuario SET habilitar=1 WHERE idUser=$idUser";
        }
        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        //retorna el resultado de la consulta.
        return $result;
    }

    function nuevoUsuarioRegistroMasivo($idUser, $idCargo)
    {
        $result = "";
        foreach ($idUser as $registro) {
            $this->idUser = $registro;
            $result = $this->nuevoUsuarioPorCargo($idCargo);
            if (!$result)
                break;
        }
        return $result;
    }

    function nuevoUsuarioRegistroMasivoRol($idUser, $idRol)
    {
        $result = "";
        foreach ($idUser as $registro) {
            $this->idUser = $registro;
            $result = $this->nuevoUsuarioPorRol($idRol);
            if (!$result)
                break;
        }
        return $result;
    }

    function nuevoUsuarioPorCargo($idCargo)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE usuario SET idCargo=$idCargo WHERE idUser=$this->idUser";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionUsuario($busquedaUsuario, $documento, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $where = "1 ";
        if ($busquedaUsuario != "") {
            $where .= "AND primerNombre LIKE '%$busquedaUsuario%' OR segundoNombre LIKE '%$busquedaUsuario%' ";
        }
        if ($documento != "") {
            $where .= "AND documentoIdentidad=$documento ";
        }
        $sql = "SELECT count(idUser) as numRegistro, u.idUser, u.tipoDocumento, u.documentoIdentidad, u.primerNombre, u.primerApellido, u.correoElectronico, u.telefono, u.habilitar, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function usuarios($busquedaUsuario, $documento, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "1 ";
        if ($busquedaUsuario != "") {
            $where .= "AND primerNombre LIKE '%$busquedaUsuario%' OR segundoNombre LIKE '%$busquedaUsuario%' ";
        }
        if ($documento != "") {
            $where .= "AND documentoIdentidad=$documento ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT u.idUser, u.tipoDocumento, u.documentoIdentidad, u.primerNombre, u.primerApellido, u.correoElectronico, u.telefono, u.habilitar, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u WHERE $where ORDER BY primerNombre ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }

    function nuevoUsuarioPorRol($idRol)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "UPDATE usuario SET idRol=$idRol WHERE idUser=$this->idUser";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarUsuarioCargo($idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //esta consulta nos permite actualizar el idCargo, volviendola Nulo
        $sql = "UPDATE usuario SET idCargo=NULL WHERE idUser=$idUser";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        //retorna el resultado de la consulta.
        return $result;
    }

    function mostrarUsuariosPorIdDiferente($idRol)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //esta consulta nos permite conocer a los usuarios que no estan registrados en ese tol
        $sql = "SELECT * FROM usuario WHERE idRol IS NULL OR idRol!=$idRol AND eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function mostrarUsuarioRol($idRol)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql = "SELECT * FROM usuario WHERE idCargo!=$idRol OR idRol IS NULL AND eliminado=false;";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function actualiazadoEliminadoUsuario($idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //esta consulta nos permite actualizar el idRol, volviendola Nulo
        $sql = "UPDATE usuario SET idRol=NULL WHERE idUser=$idUser";

        //ejecuta la consulta. query=ejecuta y se utiliza como parametros la conexion y la consulta.
        $result = mysqli_query($conexion, $sql);
        //retorna el resultado de la consulta.
        return $result;
    }

    function actualizarUsuarioDeRol($idRol, $idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "UPDATE usuario SET idRol=$idRol WHERE idUser=$idUser";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listarUsuarioPorCargo($idServicio)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql = "SELECT CONCAT(u.primerNombre,' ',u.segundoNombre) AS nombre, CONCAT(u.primerApellido,' ',u.segundoApellido) AS apellido, u.tipoDocumento, u.documentoIdentidad, u.telefono, u.idUser FROM cargo c INNER JOIN usuario u ON c.idCargo=u.idCargo WHERE c.idServicio=$idServicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarCargoUsuario($idCargo)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql = "SELECT CONCAT(u.primerNombre,' ',u.segundoNombre) AS nombre, CONCAT(u.primerApellido,' ',u.segundoApellido) AS apellido, u.tipoDocumento, u.documentoIdentidad, u.telefono, u.idUser FROM cargo c INNER JOIN usuario u ON c.idCargo=u.idCargo WHERE c.idCargo=$idCargo";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarUsuarioCargoEstilista()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para seleccionar un empleado 
        $sql = "SELECT * FROM usuario WHERE idCargo=28 AND eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function listarUsuario($pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(documentoIdentidad) as numRegistro FROM usuario WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT u.idUser, u.tipoDocumento, u.documentoIdentidad, u.primerNombre, u.primerApellido, u.correoElectronico, u.telefono, u.eliminado, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u LIMIT 10 OFFSET $inicio";


        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function reporteUsuario()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT u.documentoIdentidad, CONCAT(u.primerNombre,' ', u.primerApellido), u.correoElectronico, (SELECT r.nombreRol FROM rol r WHERE r.idRol=u.idRol) AS Rol FROM usuario u"; //esta consulta me permite traer el NOMBRE ROL DESDE LA TABLA ROL

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarUsuario($idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM usuario WHERE idUser=$idUser";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            $this->idUser = $registro['idUser'];
            $this->idRol = $registro['idRol'];
            $this->idCargo = $registro['idCargo'];
            $this->tipoDocumento = $registro['tipoDocumento'];
            $this->documentoIdentidad = $registro['documentoIdentidad'];
            $this->primerNombre = $registro['primerNombre'];
            $this->segundoNombre = $registro['segundoNombre'];
            $this->primerApellido = $registro['primerApellido'];
            $this->segundoApellido = $registro['segundoApellido'];
            $this->fechaNacimiento = $registro['fechaNacimiento'];
            $this->correoElectronico = $registro['correoElectronico'];
            $this->contrasena = $registro['contrasena'];
            $this->telefono = $registro['telefono'];
            $this->genero = $registro['genero'];
            $this->direccion = $registro['direccion'];
            $this->estadoCivil = $registro['estadoCivil'];
            $this->barrio = $registro['barrio'];
            $this->eliminado = $registro['eliminado'];
        }
    }

    function actualizarUsuario($idUser)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //consulta para actualizar el registro
        $sql = "UPDATE usuario SET idRol='$this->idRol',
        tipoDocumento='$this->tipoDocumento',
        documentoIdentidad=$this->documentoIdentidad,
        primerNombre='$this->primerNombre',
        segundoNombre='$this->segundoNombre',
        primerApellido='$this->primerApellido',
        segundoApellido='$this->segundoApellido',
        fechaNacimiento='$this->fechaNacimiento',
        correoElectronico='$this->correoElectronico',
        telefono=$this->telefono,
        genero='$this->genero',
        estadoCivil='$this->estadoCivil',
        direccion='$this->direccion',
        barrio='$this->barrio'
        WHERE idUser=$idUser";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function actualizarContrasenaUsuario($idUser, $contrasena)
    {
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena = md5($contrasena);
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //consulta para actualizar el registro
        $sql = "UPDATE usuario SET contrasena='$contrasena'
        WHERE idUser=$idUser";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function iniciarSesion($correoElectronico, $contrasena)
    {
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena = md5($contrasena);
        //genera la conexion
        $oConexion = new conectar();
        //establece conexion con la base de datos
        $conexion = $oConexion->conexion();
        //sentencia para verificar correo y contraseña de usuario
        $sql = "SELECT * FROM usuario WHERE correoElectronico='$correoElectronico' AND contrasena='$contrasena' AND habilitar=true";
        //se ejecuta sentencia
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->idUser = $registro['idUser'];
            $this->primerNombre = $registro['primerNombre'];
            $this->primerApellido = $registro['primerApellido'];
        }
        return count($result);
    }
}
