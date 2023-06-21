<div class="modal-container">
    <div class="modal modal-failed">
        <p class="modal-title">¡Failed!</p>
        <?php if($_GET['action'] == "create") { ?>
            <p class="modal-description">Failed to create <?php echo $_GET['type'] == "actor" ? "an actor" : "a movie" ?>.</h1>
        <?php } elseif($_GET['action'] == "update") { ?>
            <p class="modal-description">Failed to update <?php echo $_GET['type'] == "actor" ? "an actor" : "a movie" ?>.</h1>
        <?php } elseif($_GET['action'] == "delete") { ?>
            <p class="modal-description">Failed to delete <?php echo $_GET['type'] == "actor" ? "an actor" : "a movie" ?>.</h1>
        <?php } elseif($_GET['action'] == "view") { ?>
            <p class="modal-description">Failed to view <?php echo $_GET['type'] == "actor" ? "an actor" : "a movie" ?>.</h1>
        <?php } ?>
        <button class="modal-button"><i class="fas fa-times"></i></button>
    </div>
</div>