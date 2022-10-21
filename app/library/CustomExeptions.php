<?php
namespace App\Library;

/**
 * Exception
 */
class CustomExeptions extends \Exception {

    public function showMessage()
    {
        echo "<br><b>CustomExeptions: </b>" . parent::getMessage()."<br>";
    }
}