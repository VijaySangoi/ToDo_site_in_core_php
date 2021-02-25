<?php
class Route
{
    private $_uri=array();
    public function add($uri)
    {
        $this->_uri[]=$uri;
    }
    public function submit()
    {
        $_REQUEST['uri'];
    }
}