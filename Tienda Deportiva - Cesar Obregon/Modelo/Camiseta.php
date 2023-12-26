<?php 
class Camiseta{
    private $id;
    private $descripcion;
    private $precio;
    private $foto;
    private $id_categoria;
    private $estado;

    public function __construct(){
        $this->setId(0);
        $this->setDescripcion("");
        $this->setPrecio(0);
        $this->setId_categoria(0);
        $this->setFoto("");
        $this->setEstado(1);
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }

    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    
    public function getPrecio()
    {
        return $this->precio;
    }

    
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    
    public function getFoto()
    {
        return $this->foto;
    }

    
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }


    public function getEstado()
    {
        return $this->estado;
    }

    
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
?>