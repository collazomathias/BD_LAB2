<div class="modal-container">
    <div class="modal modal-success">
        <p class="modal-title">¡Success!</p>
        <?php if($_GET['action'] == "create") { ?>
            <p class="modal-description"><?php echo $_GET['type'] == "actor" ? "Actor" : "Movie" ?> created succesfully.</h1>
        <?php } elseif($_GET['action'] == "update") { ?>
            <p class="modal-description"><?php echo $_GET['type'] == "actor" ? "Actor" : "Movie" ?> updated succesfully.</h1>
        <?php } elseif($_GET['action'] == "delete") { ?>
            <p class="modal-description"><?php echo $_GET['type'] == "actor" ? "Actor" : "Movie" ?> deleted succesfully.</h1>
        <?php } ?>
        <button class="modal-button"><i class="fas fa-times"></i></button>
    </div>
</div>