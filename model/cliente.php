<?php
require_once 'conexiondb.php';

class cliente
{

    //atributos de la tabla de cliente
    private $idCliente = 0;
    public $tipoDocumento = "";
    public $documentoIdentidad = "";
    public $primerNombre = "";
    public $segundoNombre = "";
    public $primerApellido = "";
    public $segundoApellido = "";
    public $fechaNacimiento = "";
    public $genero = "";
    public $direccion = "";
    public $barrio = "";
    public $email = "";
    public $contrasena = "";
    public $telefono = "";
    public $numRegistro = "";
    public $numPagina = "";

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getNombreUser()
    {
        return $this->primerNombre;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function setNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre . " " . $this->primerApellido;
    }

    //funcion encargada de insertar un nuevo cliente
    function nuevoCliente()
    {
        $this->contrasena = md5($this->contrasena);
        //instancia la clase conecta 
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia para insertar un nuevo Cliente
        $sql = "INSERT INTO cliente (Tipodocumento, Documentoidentidad, primerNombre, 
        primerApellido, email, contrasena, eliminado) 
        VALUES ('$this->tipoDocumento', $this->documentoIdentidad, '$this->primerNombre', '$this->primerApellido', '$this->email', '$this->contrasena', false)";

        //ejecuta secuencia, solo cuando es insert.
        $result = mysqli_query($conexion, $sql);

        //funcion para retornar el ultimo id creado
        $sql = "SELECT (LAST_INSERT_ID()) as idCliente FROM cliente";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->idCliente = $registro['idCliente'];
        }
        // echo $sql;
        return $result;
    }

    public function consultarCorreoElectronicoExiste($email, $idCliente)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que nos permite conocer la existencia de un correo electronico
        $sql = "SELECT * FROM cliente WHERE idCliente!=$idCliente AND  email='$email'";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach ($result as $registro) {
            $this->idCliente = $registro['idCliente'];
            $this->email = $registro['email'];
        }

        return count($result);
    }


    public function perfilCliente($idCliente)
    {
        //instancia la clase conectar
        $oConexion = new conectar();
        //se establece la conexión con la base datos
        $conexion = $oConexion->conexion();

        $sql = "SELECT * 
        FROM cliente c
        JOIN detallefoto d
        ON c.idCliente = d.idCliente
        WHERE C.idCliente=$idCliente";

        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            $this->idCliente = $registro['idCliente'];
            $this->tipoDocumento = $registro['tipoDocumento'];
            $this->documentoIdentidad = $registro['documentoIdentidad'];
            $this->primerNombre = $registro['primerNombre'];
            $this->segundoNombre = $registro['segundoNombre'];
            $this->primerApellido = $registro['primerApellido'];
            $this->segundoApellido = $registro['segundoApellido'];
            $this->fechaNacimiento = $registro['fechaNacimiento'];
            $this->email = $registro['email'];
            $this->contrasena = $registro['contrasena'];
            $this->genero = $registro['genero'];
            $this->direccion = $registro['direccion'];
            $this->barrio = $registro['barrio'];
            $this->telefono = $registro['telefono'];
            $this->fotoPerfil = $registro['fotoPerfil'];
        }
        return count($result);
    }

    public function consultarCorreoElectronico($email)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM cliente WHERE email='$email'";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //retorna el numero de los registros
        foreach ($result as $registro) {
            $this->idCliente = $registro['idCliente'];
            $this->primerNombre = $registro['primerNombre'];
            $this->email = $registro['email'];
        }
        return count($result);
    }

    function documentoIdCliente()
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM cliente WHERE tipoDocumento='$this->tipoDocumento' AND documentoIdentidad=$this->documentoIdentidad";

        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    public function documentoIdUsuarioExiste($idCliente, $tipoDocumento, $documentoIdentidad)
    {
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM cliente WHERE idCliente!=$idCliente AND tipoDocumento='$tipoDocumento' AND documentoIdentidad=$documentoIdentidad";

        $result = mysqli_query($conexion, $sql);
        return count(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }

    public function registroUsuario($nombre, $email, $contrasena)
    {
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena = md5($contrasena);
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();

        //se crea la sentencia sql para registrar el usuario
        $sql = "INSERT INTO cliente (primerNombre, email, contrasena, eliminado) 
        VALUES ('$nombre', '$email', '$contrasena', false)";

        //ejecuta secuencia, solo cuando es insert.
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function iniciarSesion($email, $contrasena)
    {
        //funcion para encriptar la contraseña utilizando el metodo md5
        $contrasena = md5($contrasena);
        //genera la conexion
        $oConexion = new conectar();
        //establece conexion con la base de datos
        $conexion = $oConexion->conexion();
        //sentencia para verificar correo y contraseña de usuario
        $sql = "SELECT * FROM cliente WHERE email='$email' AND contrasena='$contrasena'";
        //se ejecuta sentencia
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->idCliente = $registro['idCliente'];
            $this->primerNombre = $registro['primerNombre'];
            $this->primerApellido = $registro['primerApellido'];
        }
        return count($result);
    }

    //esta funcion me permitira mostrar toda la informacion
    function listarCliente($pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $sql = "SELECT count(documentoIdentidad) as numRegistro FROM cliente WHERE eliminado=false;";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
        $inicio = (($pagina - 1) * 10);
        //sentencia para seleccionar un cliente
        $sql = "SELECT * FROM cliente WHERE eliminado=false LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function mostrarCliente()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();


        $sql = "SELECT * FROM cliente WHERE eliminado=false";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //esta funcion me permite consultar un cliente
    function consultarCliente($idCliente)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //esta sentencia me permite consultar un cliente
        $sql = "SELECT * FROM cliente WHERE idCliente=$idCliente";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($result as $registro) {
            //se registra la consulta en los parametros
            $this->idCliente = $registro['idCliente'];
            $this->tipoDocumento = $registro['tipoDocumento'];
            $this->documentoIdentidad = $registro['documentoIdentidad'];
            $this->primerNombre = $registro['primerNombre'];
            $this->segundoNombre = $registro['segundoNombre'];
            $this->primerApellido = $registro['primerApellido'];
            $this->segundoApellido = $registro['segundoApellido'];
            $this->fechaNacimiento = $registro['fechaNacimiento'];
            $this->email = $registro['email'];
            $this->contrasena = $registro['contrasena'];
            $this->genero = $registro['genero'];
            $this->direccion = $registro['direccion'];
            $this->barrio = $registro['barrio'];
            $this->telefono = $registro['telefono'];
        }
    }

    //esta funcion me permite actualizar la informacion del cliente
    function actualizarCliente($idCliente)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        //sentencia que permite actualizar cliente
        $sql = "UPDATE cliente SET tipoDocumento='$this->tipoDocumento',
        documentoIdentidad=$this->documentoIdentidad,
        primerNombre='$this->primerNombre',
        segundoNombre='$this->segundoNombre',
        primerApellido='$this->primerApellido',
        segundoApellido='$this->segundoApellido',
        fechaNacimiento='$this->fechaNacimiento',
        genero='$this->genero',
        direccion='$this->direccion',
        barrio='$this->barrio',
        email='$this->email',
        telefono=$this->telefono
        WHERE idCliente=$idCliente";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function eliminarCliente()
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oConexion->conexion();

        //consulta para eliminar el registro
        $sql = "UPDATE cliente SET eliminado=1 WHERE idCliente=$this->idCliente";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function paginacionCliente($tipoDocumento, $documentoIdentidad, $pagina)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Buscar numero de registro por filtros
        $where = "1 ";
        if ($tipoDocumento != "") {
            $where .= " AND tipoDocumento='$tipoDocumento' ";
        }
        if ($documentoIdentidad != "") {
            $where .= "AND documentoIdentidad LIKE '%$documentoIdentidad%' ";
        }
        $sql = "SELECT count(primerNombre) as numRegistro FROM cliente WHERE $where";
        $result = mysqli_query($conexion, $sql);
        foreach ($result as $registro) {
            $this->numRegistro = $registro['numRegistro'];
        }
        return $this->numRegistro;
    }

    function cliente($tipoDocumento, $documentoIdentidad, $pagina)
    {
        //se instancia el objeto conectar
        $oConexion = new conectar();
        //se establece conexión con la base datos
        $conexion = $oConexion->conexion();

        $where = "1 ";
        if ($tipoDocumento != "") {
            $where .= " AND tipoDocumento='$tipoDocumento' ";
        }
        if ($documentoIdentidad != "") {
            $where .= "AND documentoIdentidad LIKE'%$documentoIdentidad%' ";
        }

        $inicio = (($pagina - 1) * 10);
        $sql = "SELECT * FROM cliente WHERE $where ORDER BY primerNombre ASC LIMIT 10 OFFSET $inicio";

        //se ejecuta la consulta en la base de datos
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo $sql;
        return $result;
    }
}
