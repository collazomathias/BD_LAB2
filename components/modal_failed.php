<div class="modal-container">
    <div class="modal modal-failed">
        <p class="modal-title">¡Failed!</p>
        <p class="modal-description">Failed to <?php echo $_GET['action'] == "create" ? "create" : "update" ?> actor.</h1>
        <button class="modal-button" onclick="window.location='/?page=actors/actors'"><i class="fas fa-times"></i></button>
    </div>
</div>