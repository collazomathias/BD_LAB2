<?php

    if (!isset($_POST['movie-id']) || $_POST['movie-id'] == ""
        || !isset($_POST['movie-language']) || $_POST['movie-rental-cost'] == "" 
        || !isset($_POST['movie-title']) || $_POST['movie-title'] == "" 
        || !isset($_POST['movie-description']) || $_POST['movie-description'] == "" 
        || !isset($_POST['movie-year']) || $_POST['movie-year'] == "" 
        || !isset($_POST['movie-rental-cost']) || $_POST['movie-rental-cost'] == "" 
        || !isset($_POST['movie-duration']) || $_POST['movie-duration'] == "" 
        || !isset($_POST['movie-replacement-cost']) || $_POST['movie-replacement-cost'] == "" 
        || !isset($_POST['movie-clasification']) || $_POST['movie-clasification'] == "" 
        || !isset($_POST['movie-extra-content']) || $_POST['movie-extra-content'] == "") {
            echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=view&type=movie";</script>';
    }

    require $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    $conn = connect();
    $query_languages = "SELECT * from idiomas";
    $query_languages_result = mysqli_query(isset($connection) ? $connection : $conn, $query_languages);
    
    $id = $_POST['movie-id'];
    $language = $_POST['movie-language'];
    $title = $_POST['movie-title'];
    $description = $_POST['movie-description'];
    $year = $_POST['movie-year'];
    $duration = $_POST['movie-duration'];
    $rental_cost = $_POST['movie-rental-cost'];
    $replacement_cost = $_POST['movie-replacement-cost'];
    $clasification = $_POST['movie-clasification'];
    $extra_content = $_POST['movie-extra-content'];

?>

<h1 class="title">MOVIE DETAILS - ID <?php echo $id ?></h1>
<div class="details-container">
    <div class="details-form-container">
        <form id="update-movie-form" action="pages/movies/update_movie.php" method="POST">
            <div class="movie-information-container">
                <input type="text" id="input-movie-id" name="movie-id" class="hidden" value="<?php echo $id ?>">
                <input type="text" id="input-movie-language" name="movie-language" class="hidden" value="<?php echo $language ?>">
                <label for="input-movie-title">Title</label>
                <input type="text" id="input-movie-title" name="movie-title" value="<?php echo $title ?>" disabled>
                <label for="text-area-movie-description">Description</label>
                <textarea id="text-area-movie-description" name="movie-description" disabled><?php echo $description ?></textarea>
                <div class="movie-input-container">
                    <div class="movie-label-input three-columns">
                        <label for="input-movie-year">Year</label>
                        <input type="text" id="input-movie-year" name="movie-year" value="<?php echo $year ?>" disabled>
                    </div>
                    <div class="movie-label-input three-columns">
                        <label for="input-movie-duration">Duration</label>
                        <input type="text" id="input-movie-duration" name="movie-duration" value="<?php echo $duration ?>" disabled>
                    </div>
                    <div class="movie-label-input three-columns">
                        <label for="input-movie-clasification">Clasification</label>
                        <input type="text" id="input-movie-clasification" name="movie-clasification" value="<?php echo $clasification ?>" disabled>
                    </div>
                </div>
                <div class="movie-input-container">
                    <div class="movie-label-input three-columns">
                        <label for="input-movie-rental-cost">Rental cost</label>
                        <input type="text" id="input-movie-rental-cost" name="movie-rental-cost" value="<?php echo $rental_cost ?>" disabled>
                    </div>
                    <div class="movie-label-input three-columns">
                        <label for="input-movie-replacement-cost">Replacement cost</label>
                        <input type="text" id="input-movie-replacement-cost" name="movie-replacement-cost" value="<?php echo $replacement_cost ?>" disabled>
                    </div>
                    <div class="movie-label-input three-columns">
                        <label for="movie-language">Language</label>
                        <select name="movie-language" id="movie-language" disabled>
                            <?php foreach($query_languages_result as $lang) { ?>
                                <option <?php echo ($lang['idIdioma'] == $language) ? 'selected' : '' ?> value="<?php echo $lang['idIdioma'] ?>"><?php echo $lang['idioma'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <label for="input-lastname">Extra content</label>
                <input type="text" id="input-movie-extra-content" name="movie-extra-content" value="<?php echo $_POST['movie-extra-content'] ?>" disabled>
                <div class="form-buttons-container">
                    <div id="movie-edit-form-container"><i id="edit-form" class="fas fa-pen"></i>Edit</div>
                    <div id="movie-cancel-edit-form-container" class="hidden" val="<?php echo $id.'|'.$language.'|'.$title.'|'.$description.'|'.$year.'|'.$rental_cost.'|'.$duration.'|'.$replacement_cost.'|'.$clasification.'|'.$extra_content ?>">
                        <i id="edit-form" class="fas fa-times"></i>
                    </div>
                    <input id="movie-edit-button" type="submit" value="Update" class="submit-button update-button" disabled>
                </div>
            </div>
        </form>
    </div>
    <div class="detail-tables-container">
        <?php include_once 'movie_details_table.php'; ?>
    </div>
    <!--<button id="home-button">Go back</button>-->
</div>

<?php if(isset($conn)) disconnect($conn); ?>