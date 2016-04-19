<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.


//classe upload

Classe para realizar cadastro de arquivos... e já redimensiona o tamanho
<form method='post' enctype='multipart/form-data'>
    <br> <input type='file' name='foto' value='Cadastrar foto'> 
    <input type='submit' name='submit'> 
</form> 
    <?php 
    include "date.php"; 
    if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){ 
        $upload = new Upload($_FILES['foto'], 200, 150,"13", "assets/fotos/"); 
            echo $upload->salvar(); 
    }
    
    ?>
    
    <ul>
        <?php
            Buscando as imgs do diretorio conforme a pasta decladara
            
            $pasta = 'assets/fotos/';
            $arquivos = glob("$pasta{*.jpg,*.png,*.gif,*.bmp,*.pdf}", GLOB_BRACE);
            Os dados das imgs é retornado em um array então para receber os dadostem que echo $arquivos[0] ou seja tem que passar o indice
            

            Caso va montar uma galeria basta fazer como no exemplo
            foreach($arquivos as $img){
                echo '<li><a href="'.$img.'" id="example1"><img src="'.$img.'" alt="" width="88" height="95"/>#</a></li>';
            }
        ?>
    </ul>


