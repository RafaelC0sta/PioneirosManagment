<?php 
    if (!empty($_GET['file'])) {
        $filename = basename($_GET['file']);
        $filepath = '../ficheiros/' . $filename;
        if (!empty($filename) && file_exists($filepath)) {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attatchment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");

            readfile($filename);
            exit;
        } else {
            echo "Este ficheiro nao existe";
        }
    }
?>