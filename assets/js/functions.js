$(document).ready(function(){
    $('.edit').click(function(){
        var id = $(this).attr("val").split('-')[0];
        var nombre = $(this).attr("val").split('-')[1];
        var apellido = $(this).attr("val").split('-')[2];
        $("#clear-form-container").removeClass("hidden");
        document.getElementById("input-id").value = id;
        document.getElementById("input-name").value = nombre;
        document.getElementById("input-lastname").value = apellido;
        document.getElementById("create-update-button").value = "Update";
        document.getElementById("actor-form").action = "pages/actors/update_actor.php";
    });

    $('#clear-form-container').click(function(){
        $("#clear-form-container").addClass("hidden");
        document.getElementById("input-id").value = "";
        document.getElementById("input-name").value = "";
        document.getElementById("input-lastname").value = "";
        document.getElementById("create-update-button").value = "Create";
        document.getElementById("actor-form").action = "pages/actors/create_actor.php";
    });

    $('.trash').click(function(){
        var id = $(this).attr("val");
        document.getElementById("input-id").value = id;
        document.getElementById("actor-form").action = "pages/actors/delete_actor.php";
        document.getElementById("actor-form").submit();
    });
});