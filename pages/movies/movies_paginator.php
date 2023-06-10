<?php
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    if(!isset($connection)) $conn = connect();
    $total_select_query = "SELECT * FROM peliculas";
    $total_query_result = mysqli_query(isset($connection) ? $connection : $conn, $total_select_query);
    $count = mysqli_num_rows($total_query_result);
    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
    $per_page = 30;
    $total_pages_to_show = 5;
    $totalPages = ceil($count / $per_page);
    $startPage = max(1, $currentPage - floor($total_pages_to_show / 2));
    $endPage = min($startPage + $total_pages_to_show - 1, $totalPages);

?>

    <p class="total-count">Movies total count: <span id="total-count"><?php echo $count ?></span></p>
    <?php if($currentPage > 1) { ?> 
        <a class="pagination-item first-page" href="#" onclick="changePage(1, 'movie')"><i class="fas fa-fast-backward"></i></a>
    <?php } ?>
    <?php for ($i = $startPage; $i <= $endPage; $i++) { ?> 
        <a class="pagination-item <?php echo ($i == $currentPage) ? ' active' : '' ?>" href="#" onclick="changePage(<?php echo $i ?>, 'movie')"><?php echo $i ?></a>
    <?php } ?>
    <?php if($currentPage < $totalPages) { ?> 
        <a class="pagination-item last-page" href="#" onclick="changePage(<?php echo $totalPages ?>, 'movie')"><i class="fas fa-fast-forward"></i></a>
    <?php } ?>

<?php if(isset($conn)) disconnect($conn); ?>
