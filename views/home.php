<?php

//api
$api = new \App\Api();

?>
<h3 style="text-align: center">Bem-vindos a minha aplicação</h3>
<br><br>

<table class="table table-hover table-striped" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Compania</th>
            <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($api->getUsers() as $users){ 
                $lugar = $users["address"]["geo"]["lat"].','.$users["address"]["geo"]["lng"];
 
                $maps = "https://www.google.com.br/maps/@".$lugar.",15z?hl=pt-BR&authuser=0";
            ?>
        <tr>
            <td><?php echo $users["id"] ?></td>
            <td><?php echo $users["name"] ?></td>
            <td><?php echo $users["email"] ?></td>
            <td><?php echo $users["phone"] ?></td>
            <td><?php echo $users["company"]["name"] ?></td>
            <td><a href="<?php echo $maps ?>" target="_blank" rel="noopener noreferrer">ver no mapa</a></td>
        </tr>
        <?php }?>
    </tbody>
</table>
	


