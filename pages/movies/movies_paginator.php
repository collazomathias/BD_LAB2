<?php
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    if(!isset($connection)) $conn = connect();
    if(isset($_GET['search']) && $_GET['search'] != '') {
        $search = "'".$_GET['search']."'";
        $limited_select_query = filter_var($_GET['search'], FILTER_VALIDATE_INT) ? "SELECT * FROM peliculas WHERE idPelicula = ".$_GET['search'].";" : "SELECT * FROM peliculas WHERE titulo LIKE '%".$_GET['search']."%' OR descripcion LIKE '%".$_GET['search']."%' OR anio LIKE '%".$_GET['search']."%';";
    } else {
        $search = "''";
        $limited_select_query = "SELECT * FROM peliculas;";
    }
    $total_query_result = mysqli_query(isset($connection) ? $connection : $conn, $limited_select_query);
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
        <a id="itempage_first" class="pagination-item first-page" href="#" onclick="changePage(this.id, 1, 'movie', <?php echo $search ?>)"><i class="fas fa-fast-backward"></i></a>
    <?php } ?>
    <?php for ($i = $startPage; $i <= $endPage; $i++) { ?> 
        <a id="itempage_<?php echo $i ?>" class="pagination-item <?php echo ($i == $currentPage) ? ' active' : '' ?>" href="#" onclick="changePage(this.id, <?php echo $i ?>, 'movie', <?php echo $search ?>)"><?php echo $i ?></a>
    <?php } ?>
    <?php if($currentPage < $totalPages) { ?> 
        <a id="itempage_last" class="pagination-item last-page" href="#" onclick="changePage(this.id, <?php echo $totalPages ?>, 'movie', <?php echo $search ?>)"><i class="fas fa-fast-forward"></i></a>
    <?php } ?>

<?php if(isset($conn)) disconnect($conn); ?>
