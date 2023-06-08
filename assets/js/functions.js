$(document).ready(function(){
    $('.edit').click(function(){
        var id = $(this).attr("val").split('-')[0];
        var nombre = $(this).attr("val").split('-')[1];
        var apellido = $(this).attr("val").split('-')[2];
        document.getElementById("input-id").value = id;
        document.getElementById("input-name").value = nombre;
        document.getElementById("input-lastname").value = apellido;
    });
});