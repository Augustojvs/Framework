<?php

//api
$api = new \App\Api();

?>
<h3 style="text-align: center">Bem-vindos a minha aplicação</h3>
<br><br>

<form method="GET" action="<?= BASE ?>" class="input-group mb-3">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-outline-info" id="pesquisar">Pesquisar</button>
        <select class="btn btn-outline-info" id="category" name="category" >
            <option value="name">Nome</option>
            <option value="email">Email</option>
            <option value="phone">Telefone</option>
        </select>
    </div>
    <input type="text" class="form-control" id="inputSearch" name="inputSearch" aria-label="Text input with segmented dropdown button" placeholder="Selecione uma categoria e pesquise um usuario">
</form>

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

$data = $api->getUsers();

foreach ($data as $users) {
    $lugar = $users["address"]["geo"]["lat"] . ',' . $users["address"]["geo"]["lng"];

    $maps = "https://www.google.com.br/maps/@" . $lugar . ",15z?hl=pt-BR&authuser=0";
    ?>
            <tr>
                <td><?php echo $users["id"] ?></td>
                <td><?php echo $users["name"] ?></td>
                <td><?php echo $users["email"] ?></td>
                <td><?php echo $users["phone"] ?></td>
                <td><?php echo $users["company"]["name"] ?></td>
                <td><a href="<?php echo $maps ?>" target="_blank" rel="noopener noreferrer">ver no mapa</a></td>
            </tr>
<?php } ?>
    </tbody>
</table>

<script>
    /*  $('#pesquisar').on('click', function(){
     console.log('aqui');
     if($('#inputSearch').val() !== ""){
     
     var cat = $('#category :selected').val();
     var input =  $('#inputSearch').val();
     
     $.ajax({
     url: 'process.php',
     type: "POST",
     data: {
     category: cat,
     word: input,
     },
     success: function (response) {
     $('#msgAviso').html(`<label class="text-success">${response.mensagem}</label>`);
     },
     error: function({responseJSON}) {
     $('#msgAviso').html('<label class="text-danger">Falha ao enviar mensagem.</label>');
     },
     complete: function () {
     $('#testaEnvio').modal('hide');
     }
     });
     }
     });
     */
</script>

