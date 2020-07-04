<?php
require '../config.php';
require '../header.php';

$api = new \App\Api();

?>

<form method="GET" action="<?= BASE ?>/views/postagens" class="input-group mb-3">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-outline-info" id="pesquisar">Pesquisar</button>
        <select class="btn btn-outline-info" id="category" name="category" >
            <option value="title">Titulo</option>
            <option value="body">Comentário</option>
        </select>
    </div>
    <input type="text" class="form-control" id="inputSearch" name="inputSearch" aria-label="Text input with segmented dropdown button" placeholder="Selecione uma categoria e pesquise uma postagem">
</form>
<br><br>

<?php
$sample_data = $api->getPosts();

// use get variable to paging number
$page = !isset($_GET['page']) ? 1 : $_GET['page'];
$limit = 5; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($sample_data); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($sample_data, $offset, $limit); // splice them according to offset and limit

foreach ($final as $key => $value) {
    $user = $api->getUserSpecific($value["userId"]);
    $comments = $api->getComments($value["id"]);
    ?>
    <div class="card">
        <div class="card-header">
            <?php echo $value["title"] ?>         
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?php echo $value["body"] ?></p>
                <div class="blockquote-footer">Autor: <cite title="Source Title"><?php echo $user["name"] ?></cite></div>
                <br>
                <div class="list-group">
                    <?php foreach ($comments as $comment){
                        $input = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                        $rand_keys = array_rand($input);
                        $days = $input[$rand_keys]." days ago";
                    ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><b><?php echo $comment["name"] ?></b></h5>
                            <small><?php echo $days ?></small>
                        </div>
                        <p class="mb-1"><?php echo $comment["body"] ?></p>
                        <small><?php echo $comment["email"] ?></small>
                    </a>
                    <?php } ?>
                </div>
            </blockquote>
        </div>
    </div>
    <br>
<?php } ?>

<nav aria-label="...">
    <ul class=" paginator ">
        <?php for ($x = 1; $x <= $total_pages; $x++) { ?>
            <li class="page-item"> 
                <a href='postagens?page=<?php echo $x; ?>'><?php echo $x; ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php require '../footer.php';
?>