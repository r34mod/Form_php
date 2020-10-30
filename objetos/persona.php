<?php
    class Persona{

        //constante del checkbox y radioButton


        const listaSexo = [
            'M'=>'Mujer',
            'H'=>'Hombre'
        ];

        

        
        private $nombre;
        
        private $fecha;
        private $sexo;
        private $foto;

        function __construct($nombre, $fecha, $sexo, $foto){
            
            $this->nombre=$nombre;
            
            $this->fecha=$fecha;
            $this->sexo=$sexo;
            $this->foto=$foto;
        }


        function getNombre(){
            return $this->nombre;
        }

        function getFecha(){
            return $this->fecha;
        }

        function getSexo(){
            return $this->sexo;
        }

        function getFoto(){
            return $this->foto;
        }

        function setNombre($valor){
            $this->nombre = trim($valor);
        }

        function setFecha($valor){
            $this->fecha = trim($valor);
        }

        function setSexo($valor){
            $this->sexo = isset(Persona::listaSexo[$valor]) ? $valor : 'H';
              
        }

        function setFoto($valor){
            $this->foto = trim($valor);
        }


        function getListaSexo(){
            return Persona::listaSexo[$this->sexo];
        }


        

        public function datosPersona(){
            return "<b>Persona: </b><br>&nbsp;&nbsp;&nbsp;&nbsp;".
            "Nombre: $this->nombre <br>&nbsp;&nbsp;&nbsp;&nbsp; Apellido: $this->apellido <br>
            &nbsp;&nbsp;&nbsp;&nbsp; Edad: $this->edad<br>";
        }


        function __toString(){
            return sprintf('[%s:%s:%s:%s:%s:%s]',
                $this->nombre, 
                $this->fecha,
                $this->getListaSexo(),
                $this->foto
        );
        }
    }
?>