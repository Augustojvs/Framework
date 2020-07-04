<?php
require '../config.php';
require '../header.php';
//api
$api = new \App\Api();

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

<!-- print links -->
<?php for ($x = 1; $x <= $total_pages; $x++) { ?>
    <a href='albums?page=<?php echo $x; ?>'><?php echo $x; ?></a>
    <?php
}

require '../footer.php';
?>
