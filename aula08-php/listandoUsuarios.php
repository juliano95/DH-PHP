<?php 

    require_once('inc/head.php');
    require_once('inc/header.php');

    $usuarios = file_get_contents("usuarios.json");
    $usuarios = json_decode($usuarios, true);

?>

<div>
    <h1>Listando Usuarios</h1>
    <table class= "table table-hovered">
        <thead>
            <tr class = row>
                <th class="col-md-4">Avatar</th>
                <th class="col-md-4">Nome</th>
                <th class="col-md-4">E-mail</th>
            </tr>
        </thead>  
        <tbody>
            <?php foreach($usuarios["usuarios"] as $usuarios): ?>
            <tr class="row">
                <td class="col-md-4">
                    <img src="<?php echo $usuarios["imagem"];?>" class="img" alt="">                
                </td>
                <td class="col-md-4"><?php echo $usuarios["nome"];?></td>
                <td class="col-md-4"><?php echo $usuarios["email"];?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>  
    </table>
</div>