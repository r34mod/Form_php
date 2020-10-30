<?php
    class Deporte{
        const listaDeportes = [
            'F'=>'Futbol',
            'B'=>'Baloncesto',
            'N'=>'Natacion',
            'C'=>'Ciclismo'
        ];

        
       
       
        private $deporte;


        function __contruct( $deporte){
           
            
            
            $this->deporte=$deporte;
        }

        function getDeporte(){
            return $this->deporte;
        }


        function setDeportes($valor){
            $this->deportes = [];
            foreach ($valor as $eleccion){
                if(isset(Persona::listaDeportes[$eleccion])){
                    $this->deportes[]=$eleccion;
                }
            }
        }

        function getListaDeportes(){
            $valores=[];
            foreach($this->deportes as $codigo){
                $valores[] = Persona::listaDeportes[$codigo];
            }


            return implode(',',$valores);
        }
    }

?>