$(document).ready(function () {
    $('#clear-form-container').click(function () {
        $("#clear-form-container").addClass("hidden");
        document.getElementById("input-id").value = "";
        document.getElementById("input-name").value = "";
        document.getElementById("input-lastname").value = "";
        document.getElementById("create-update-button").value = "Create";
        document.getElementById("actor-form").action = "pages/actors/create_actor.php";
    });

    $(document).on('click', '.actor-edit', function () {
        var id = $(this).attr("val").split('|')[0];
        var name = $(this).attr("val").split('|')[1];
        var lastname = $(this).attr("val").split('|')[2];
        editActor(id, name, lastname);
    });

    $(document).on('click', '.actor-trash', function () {
        var id = $(this).attr("val");
        deleteActor(id);
    });

    $(document).on('click', '.movie-edit', function () {
        var id = $(this).attr("val").split('|')[0];
        var language = $(this).attr("val").split('|')[1];
        var title = $(this).attr("val").split('|')[2];
        var description = $(this).attr("val").split('|')[3];
        var year = $(this).attr("val").split('|')[4];
        var rental_cost = $(this).attr("val").split('|')[5];
        var duration = $(this).attr("val").split('|')[6];
        var replacement_cost = $(this).attr("val").split('|')[7];
        var clasification = $(this).attr("val").split('|')[8];
        var extra_content = $(this).attr("val").split('|')[9];
        editMovie(id, language, title, description, year, rental_cost, duration, replacement_cost, clasification, extra_content);
    });

    $(document).on('click', '.movie-trash', function () {
        var id = $(this).attr("val");
        deleteMovie(id);
    });

    $(document).on('click', '.movie-view', function () {
        var id = $(this).attr("val").split('|')[0];
        var language = $(this).attr("val").split('|')[1];
        var title = $(this).attr("val").split('|')[2];
        var description = $(this).attr("val").split('|')[3];
        var year = $(this).attr("val").split('|')[4];
        var rental_cost = $(this).attr("val").split('|')[5];
        var duration = $(this).attr("val").split('|')[6];
        var replacement_cost = $(this).attr("val").split('|')[7];
        var clasification = $(this).attr("val").split('|')[8];
        var extra_content = $(this).attr("val").split('|')[9];
        viewMovie(id, language, title, description, year, rental_cost, duration, replacement_cost, clasification, extra_content);
    });

    $('#movie-clear-form-container').click(function () {
        $("#movie-clear-form-container").addClass("hidden");
        $("#movie-language").val($("#movie-language option:first").val());
        document.getElementById("input-movie-id").value = "";
        document.getElementById("input-movie-title").value = "";
        document.getElementById("text-area-movie-description").value = "";
        document.getElementById("input-movie-year").value = "";
        document.getElementById("input-movie-rental-cost").value = "";
        document.getElementById("input-movie-duration").value = "";
        document.getElementById("input-movie-replacement-cost").value = "";
        document.getElementById("input-movie-clasification").value = "";
        document.getElementById("input-movie-extra-content").value = "";
        document.getElementById("movie-create-update-button").value = "Create";
        document.getElementById("movie-form").action = "pages/movies/create_movie.php";
    });

    $('.modal-button').click(function () {
        $('.modal-container').fadeOut('fast');
    });
});

$(window).on("load", function () {
    setTimeout(function () {
        $('.loader-container').fadeOut('slow')
    }, 1000);
});

function changePage(pageNumber, type) {
    $.ajax({
        url: type == 'actor' ? 'pages/actors/actors_table.php' : 'pages/movies/movies_table.php',
        type: 'GET',
        data: { pagenumber: pageNumber },
        success: function (response) {
            if(type == 'actor') {
                $('#actors-table').html(response);
                updatePaginator(pageNumber, 'actor');
            } else {
                $('#movies-table').html(response);
                updatePaginator(pageNumber, 'movie');
            }
        },
        error: function () {
            alert('Error updating table.');
        }
    });
}

function updatePaginator(currentPage, type) {
    $.ajax({
        url: type == 'actor' ? 'pages/actors/actors_paginator.php' : 'pages/movies/movies_paginator.php',
        type: 'GET',
        data: { pagenumber: currentPage },
        success: function (response) {
            $('.pagination-container').html(response);
        },
        error: function () {
            alert('Error updating paginator.');
        }
    });
}

function editActor(id, name, lastname) {
    $("#clear-form-container").removeClass("hidden");
    document.getElementById("input-id").value = id;
    document.getElementById("input-name").value = name;
    document.getElementById("input-lastname").value = lastname;
    document.getElementById("create-update-button").value = "Update";
    document.getElementById("actor-form").action = "pages/actors/update_actor.php";
}

function deleteActor(id) {
    document.getElementById("input-id").value = id;
    document.getElementById("actor-form").action = "pages/actors/delete_actor.php";
    document.getElementById("actor-form").submit();
}

function editMovie(id, language, title, description, year, rental_cost, duration, replacement_cost, clasification, extra_content) {
    $("#movie-clear-form-container").removeClass("hidden");
    document.getElementById("input-movie-id").value = id;
    document.getElementById("input-movie-title").value = title;
    document.getElementById("text-area-movie-description").value = description;
    document.getElementById("input-movie-year").value = year;
    document.getElementById("input-movie-rental-cost").value = rental_cost;
    document.getElementById("input-movie-duration").value = duration;
    document.getElementById("input-movie-replacement-cost").value = replacement_cost;
    document.getElementById("input-movie-clasification").value = clasification;
    document.getElementById("input-movie-extra-content").value = extra_content;
    document.getElementById("movie-language").value = language;
    document.getElementById("movie-create-update-button").value = "Update";
    document.getElementById("movie-form").action = "pages/movies/update_movie.php";
}

function deleteMovie(id) {
    document.getElementById("input-movie-id").value = id;
    document.getElementById("movie-form").action = "pages/movies/delete_movie.php";
    document.getElementById("movie-form").submit();
}

function viewMovie(id, language, title, description, year, rental_cost, duration, replacement_cost, clasification, extra_content) {   
    document.getElementById("input-movie-id").value = id;
    document.getElementById("input-movie-language").value = language;
    document.getElementById("input-movie-title").value = title;
    document.getElementById("text-area-movie-description").value = description;
    document.getElementById("input-movie-year").value = year;
    document.getElementById("input-movie-rental-cost").value = rental_cost;
    document.getElementById("input-movie-duration").value = duration;
    document.getElementById("input-movie-replacement-cost").value = replacement_cost;
    document.getElementById("input-movie-clasification").value = clasification;
    document.getElementById("input-movie-extra-content").value = extra_content;
    document.getElementById("movie-form").action = "pages/movies/movie_details.php";
    document.getElementById("movie-form").submit();
}
