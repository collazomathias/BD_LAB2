<?php
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    if(!isset($connection)) $conn = connect();

    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
    $per_page = 30;
    $start = ($currentPage - 1) * $per_page;
    if(isset($_GET['search']) && $_GET['search'] != '') {
        $limited_select_query = filter_var($_GET['search'], FILTER_VALIDATE_INT) ? "SELECT * FROM actores WHERE idActor = ".$_GET['search']." LIMIT ".$start.", ".$per_page.";" : "SELECT * FROM actores WHERE nombre LIKE '%".$_GET['search']."%' OR apellido LIKE '%".$_GET['search']."%' LIMIT ".$start.", ".$per_page.";";
    } else {
        $limited_select_query = "SELECT * FROM actores LIMIT $start, $per_page";
    }
    $query_result = mysqli_query(isset($connection) ? $connection : $conn, $limited_select_query);

    if ($query_result) {
        ob_start(); 
    ?>
        <table id="actors-table">
            <thead class="sticky">
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th> 
                    <div class="search-container">
                        <input type="text" id="input-search" placeholder="Search..." name="search">
                        <?php echo (isset($_GET['search']) && $_GET['search'] != '') ? 
                        '<i id="cancel-search-actor-button" class="fas fa-times"></i>'
                        : 
                        '<i id="search-actor-button" class="fas fa-search"></i>'  
                        ?>
                    </div>
                </th>
            </thead>
            <tbody>
                <?php
                $counter = 0;
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $id = $row['idActor'];
                    $name = $row['nombre'];
                    $lastname = $row['apellido'];
                    $counter++;
                ?>
                    <tr class="<?php echo ($counter == $per_page) ? 'last-item' : 'item' ?>">
                        <td><?php echo $id ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $lastname ?></td>
                        <td>
                            <button title="Edit actor" class="actor-edit" val="<?php echo $id.'|'.$name.'|'.$lastname ?>"><i class="fas fa-edit"></i></button>
                            <button title="Delete actor" val="<?php echo $id ?>" class="actor-trash"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
        $tableHTML = ob_get_clean();
        echo $tableHTML;
    } else echo 'There are no results to show.';

    if(isset($conn)) disconnect($conn);

?>
