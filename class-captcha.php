<?php
session_start();
error_reporting(0);

class mathcaptcha
{
    private $bil1;
    private $bil2;
    private $operator;

    function initial()
    {
        $listoperator = array('ditambah','dikurang');
        $this->bil1 = rand(0, 99);
        $this->bil2 = rand(0, 9);
        $this->operator = $listoperator[rand(0, 1)];
    }

    function generatekode()
    {
        $this->initial();

        if ($this->operator == 'ditambah') $hasil = $this->bil1 + $this->bil2;
        else if ($this->operator == 'dikurang') $hasil = $this->bil1 - $this->bil2;
        $_SESSION['kode'] = $hasil;
    }

    function showcaptcha()
    {
        echo "Berapa hasil dari ".$this->bil1." ".$this->operator." ".$this->bil2." ? ";
    }	

    function resultcaptcha()
    {
        return $_SESSION['kode'];
    }

}
?>