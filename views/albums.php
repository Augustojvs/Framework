<?php
require '../config.php';
require '../header.php';
//api
$api = new \App\Api();
?>

<form method="GET" action="<?= BASE ?>/views/albums" class="input-group mb-3">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-outline-info" id="pesquisar">Pesquisar</button>
        <input type="hidden" id="category" name="category" value="title">
    </div>
    <input type="text" class="form-control" id="inputSearch" name="inputSearch" aria-label="Text input with segmented dropdown button" placeholder="Pesquise por um album">
</form>
<br><br>

<?php 
$sample_data = $api->getAlbums();

// use get variable to paging number
$page = !isset($_GET['page']) ? 1 : $_GET['page'];
$limit = 8; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($sample_data); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($sample_data, $offset, $limit); // splice them according to offset and limit
?>
<form method="post" action="<?= BASE ?>/views/photos">
    <div class="container">
        <div class="row">
            <?php
            foreach ($final as $key => $value) {
                $user = $api->getUserSpecific($value["userId"]);
                ?>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value["title"] ?></h5>
                            <p class="card-text"><?php echo $user["name"] ?></p>
                            <input type="hidden" name="id" name="id" value="<?=$value["id"]?>" >
                            <button type="submit" class="btn btn-info">Ver Fotos</button>
                        </div>
                    </div>
                    <br><br>
                </div> 
            <?php } ?>
        </div>
    </div>
</form>

<nav aria-label="...">
    <ul class=" paginator ">
        <?php for ($x = 1; $x <= $total_pages; $x++) { ?>
            <li class="page-item"> 
                <a href='albums?page=<?php echo $x; ?>'><?php echo $x; ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php require '../footer.php';
?>
