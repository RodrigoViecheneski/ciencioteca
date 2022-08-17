<?php
class Upload {
    private $name;
    private $extension;
    private $type;
    private $tmpName;
    private $erro;
    private $con;
    private $path;

    public function __construct($file){
        $this->con = new Conexao();
        $this->type = $file['type'];
        $this->tmpName = $file['tmp_name'];
        $this->erro = $file['error'];
        $info = pathinfo($file['name']);
        $this->name = $info['filename'];
        $this->extension = $info['extension'];
    }

    public function getBasename(){
        $extension = strlen($this->extension)? '.'.$this->extension : '';
        return $this->name.$extension;
    }

    public function setBasename($name){
        $this->name = $name;
    }

    public function generateBasename(){
        $name = time().rand(1000000, 999999).uniqid();
        $this->setBasename($name);
    }

    public function upload($dir, $overwrite = TRUE){
        if($this->erro != 0) return FALSE;

        $path = $dir.'/'.$this->getBasename();
        $this->path = $path;

        return move_uploaded_file($this->tmpName, $path);
    }
    
    public function getPath(){
        return $this->path;
    }

    public function getExtension(){
        return $this->extension;
    }
    
    public static function createMultiUpload($files){
        $uploads = [];

        foreach($files['name'] as $key=>$value){
            $file = [
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key]
            ];
            $uploads[] = new Upload($file);
        }
        return $uploads;
    }
}