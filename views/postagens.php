<?php
require '../config.php';
require '../header.php';

$api = new \App\Api();

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
    ?>
    <div class="card">
        <div class="card-header">
            <?php echo $value["title"] ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?php echo $value["body"] ?></p>
                <div class="blockquote-footer">Autor: <cite title="Source Title"><?php echo $user["name"] ?></cite></div>
            </blockquote>
        </div>
    </div>
    <br>
<?php } ?>

<!-- print links -->
<?php for ($x = 1; $x <= $total_pages; $x++) { ?>
    <a href='postagens?page=<?php echo $x; ?>'><?php echo $x; ?></a>
<?php
}

require '../footer.php';
?>