<?php
require '../config.php';
require '../header.php';
//api
$api = new \App\Api();

$sample_data = $api->getPhotos();

// use get variable to paging number
$page = !isset($_GET['page']) ? 1 : $_GET['page'];
$limit = 9; // five rows per page
$offset = ($page - 1) * $limit; // offset
$total_items = count($sample_data); // total items
$total_pages = ceil($total_items / $limit);
$final = array_splice($sample_data, $offset, $limit); // splice them according to offset and limit
?>
<div class="container">
    <div class="row">
        <?php
        foreach ($final as $key => $value) {
            $album = $api->getSpecificAlbum($value["albumId"]);
            ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $value["thumbnailUrl"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?php echo $album["title"] ?></p>
                    </div>
                </div>
                <br><br>
            </div>
        <?php } ?>
    </div>
</div>

<!-- print links -->
<?php for ($x = 1; $x <= $total_pages; $x++) { ?>
    <a href='albums?page=<?php echo $x; ?>'><?php echo $x; ?></a>
    <?php
}

require '../footer.php';
?>
