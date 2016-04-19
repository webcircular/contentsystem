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
$pasta = 'assets/fotos/';
$arquivos = glob("$pasta{*.jpg,*.png,*.gif,*.bmp,*.pdf}", GLOB_BRACE);
var_dump($arquivos);
echo '<pre>';
print_r($arquivos);
echo $arquivos[0];
foreach($arquivos as $img){
echo '<li><a href="'.$img.'" id="example1"><img src="'.$img.'" alt="" width="88" height="95"/>#</a></li>';
}
?>
</ul>