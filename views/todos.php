<?php
require '../config.php';
require '../header.php';
//api
$api = new \App\Api();

$sample_data = $api->getTodos();

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
        $user = $api->getUserSpecific($value["userId"]);
        $input = array("primary", "secondary", "success", "danger", "warning", "info", "dark");
        $rand_keys = array_rand($input);
        $border = "border-".$input[$rand_keys];
        $body = "text-".$input[$rand_keys];
        ?>
        <div class="col-sm-4 cardTodos">
            <div class="card <?php echo $border ?> mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $user["name"] ?></div>
                <div class="card-body <?php echo $body ?>">
                    <h5 class="card-title"><?php echo $value["title"] ?></h5>
                    <p class="card-text"><?php if($value["completed"] == true){ ?> 
                        <img src="<?= BASE ?>/assets/img/success.png" title="Feito" alt="like" class="img-todos"> 
                    <?php }else{ ?> 
                        <img src="<?= BASE ?>/assets/img/fail.png" title="A fazer" alt="deslike" class="img-todos">
                    <?php } ?> 
                    </p>
                </div>
            </div>
            <br><br>
        </div>
        <?php } ?>
    </div>
</div>

<!-- print links -->
<?php
for ($x = 1; $x <= $total_pages;$x++) {
?>
<a href='todos?page=<?php echo $x; ?>'><?php echo $x; ?></a>
<?php
}

require '../footer.php';
?>