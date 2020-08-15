<?php 
    $bagianJS	    = "";
    $bagianHTML    = "";
    $bagian 	    = isset($_GET['url'])?$_GET['url']:'';

    switch ($bagian){
        case "member":
            $bagianHTML = "halaman/member/memberHTML.php";
            $bagianJS = "halaman/member/memberJS.php";
        break;

        case "peminjaman":
            $bagianHTML = "halaman/peminjaman/peminjamanHTML.php";
            $bagianJS = "halaman/peminjaman/peminjamanJS.php";
        break;

    }

?>