<?php

final class Lista {

    public $id;
    public $url;
    public $data;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function setData($data){
        $this->data=$data;
        return $this;
    }

}

?>