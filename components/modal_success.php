<div class="modal-container">
    <div class="modal modal-success">
        <p class="modal-title">¡Success!</p>
        <p class="modal-description">Actor <?php echo $_GET['action'] == "create" ? "created" : "updated" ?> successfully.</p>
        <button class="modal-button" onclick="window.location='/?page=actors/actors'"><i class="fas fa-times"></i></button>
    </div>
</div>