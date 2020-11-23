
<?php
    class Usuario{
        private $nombre;
        private $apellido;
        private $fechaNacimiento;
        private $pais;
    
        
        public function __construct($nombre, $apellido, $fechaNacimiento,$pais){

        
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->pais = $pais;
        }
        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
             $this->nombre = $nombre;
             return $this;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
            return $this;
        }

        public function getFechaNacimiento()
        {
            return $this->fechaNacimiento;
        }

        public function setfechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
            return $this;
        }

        public function getpais()
        {
            return $this->pais;
        }

        public function setpais($pais)
        {
            $this->pais = $pais;
            return $this;
        }


        //CRUD
        public function guardarUsuario(){
           $contenidoArchivo= file_get_contents ("../pruebadiagnostico/data/usuarios.json");
           $usuarios = json_decode($contenidoArchivo,true);
           $usuarios[] = array(
                "nombre"=> $this-> nombre,
                "apellido"=> $this-> apellido,
                "fechaNacimiento"=> $this-> fechaNacimiento,
                "pais"=> $this-> pais

            );
            $archivo = fopen("../pruebadiagnostico/data/usuarios.json","w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
        }

        public static function obtenerUsuarios(){
            $contenidoArchivo= file_get_contents ("../pruebadiagnostico/data/usuarios.json");
            echo $contenidoArchivo;
            
        }

        public static function obtenerUsuario($indice){
            $contenidoArchivo= file_get_contents ("../pruebadiagnostico/data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo,true); 
            echo json_encode ($usuarios[$indice]);
            
            
        }

        public function actualizarUsuario($indice){
            $contenidoArchivo= file_get_contents ("../pruebadiagnostico/data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo,true); 
            //$usuario=$usuarios[$indice];
            $usuario = array(
                        'nombre'=>$this->nombre,
                        'apellido'=>$this->apellido,
                        'fechaNacimiento'=>$this->fechaNacimiento,
                        'pais'=>$this->pais
            );
            $usuarios[$indice]=$usuario;
            $archivo = fopen('../pruebadiagnostico/data/usuarios.json','w');
            fwrite($archivo,json_encode($usuarios));
            fclose($archivo);
                        
        }
        public static function eliminarUsuario($indice){
            $contenidoArchivo= file_get_contents ("../pruebadiagnostico/data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo,true); 
            array_splice($usuarios,$indice,1); 
            $archivo = fopen('../pruebadiagnostico/data/usuarios.json','w');
            fwrite($archivo,json_encode($usuarios));
            fclose($archivo);
        }
    
    }
  

?>

