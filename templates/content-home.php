<?php
session_start();
ob_start();
if (!is_logged_in()) {
    login_error_redirect();
}
$sql_return = "SELECT * FROM `logo` ORDER BY id ASC";
$result_data = mysqli_query($db, $sql_return);
if ($result_data) {
?>
    <?php while ($row = mysqli_fetch_assoc($result_data)) : ?>
        <div class="row pt-3 flex-wrap">
            <div class="col-md-4 order-lg-2">
                <img src="https://placehold.jp/230x160.png" style="height: 200px;opacity: 0.8;" class="w-100 img-fluid">
            </div>
            <div class="col-md-8 lorem-text order-lg-1 order-sm-2 pt-2">
                <h3>Lorem ipsum dolor sit amt</h3>
                <p class="inner">
                    <?= $row['text'] ?>
                </p>
            </div>
            <div class="col-md-12 order-lg-2 pt-2">
                <p class="lorem-text">
                    <?= $row['text'] ?>
                </p>
                <div class="col pt-2">
                    <p class="lorem-text">
                        <?= $row['text'] ?>
                    </p>
                </div>
                <div class="col pt-2">
                    <p class="lorem-text">
                        <?= $row['text'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php
} else {
    echo "<h3 class='mt-4 text-center' >No Data Enzeigen</h3>";
}
?>