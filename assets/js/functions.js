$(document).ready(function () {
    

    $('#clear-form-container').click(function() {
        $("#clear-form-container").addClass("hidden");
        document.getElementById("input-id").value = "";
        document.getElementById("input-name").value = "";
        document.getElementById("input-lastname").value = "";
        document.getElementById("create-update-button").value = "Create";
        document.getElementById("actor-form").action = "pages/actors/create_actor.php";
    });

    $(document).on('click', '.actor-edit', function() {
        var id = $(this).attr("val").split('|')[0];
        var name = $(this).attr("val").split('|')[1];
        var lastname = $(this).attr("val").split('|')[2];
        editActor(id, name, lastname);
    });

    $(document).on('click', '.actor-trash', function() {
        var id = $(this).attr("val");
        deleteActor(id);
    });

    $(document).on('click', '.movie-edit', function() {
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

    $(document).on('click', '.movie-trash', function() {
        var id = $(this).attr("val");
        deleteMovie(id);
    });

    $(document).on('click', '.movie-view', function() {
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

    $('#movie-clear-form-container').click(function() {
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

    $(document).on('click', '.modal-button', function() {
        $('.modal-container').fadeOut('fast');
    });

    $(document).on('click', '#search-actor-button', function() {
        var value = $('#input-search').val();
        searchValue(value, 'actor');
    });
    
    $(document).on('click', '#cancel-search-actor-button', function() {
        cancelSearchValue('actor');
    });

    $(document).on('click', '#search-movie-button', function() {
        var value = $('#input-search').val();
        searchValue(value, 'movie');
    });
    
    $(document).on('click', '#cancel-search-movie-button', function() {
        cancelSearchValue('movie');
    });

    $(document).on('click', '#movie-edit-form-container', function() {
        if($(this).hasClass('disabled')) return false;
        document.getElementById('input-movie-title').disabled = false;
        document.getElementById('text-area-movie-description').disabled = false;
        document.getElementById('input-movie-year').disabled = false;
        document.getElementById('input-movie-rental-cost').disabled = false;
        document.getElementById('input-movie-duration').disabled = false;
        document.getElementById('input-movie-replacement-cost').disabled = false;
        document.getElementById('input-movie-clasification').disabled = false;
        document.getElementById('input-movie-extra-content').disabled = false;
        document.getElementById('movie-language').disabled = false;
        document.getElementById('movie-edit-button').disabled = false;
        $('#movie-cancel-edit-form-container').removeClass('hidden');
        $(this).addClass('disabled');
    });

    $(document).on('click', '#movie-cancel-edit-form-container', function() {
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
        document.getElementById('input-movie-id').value = id;
        document.getElementById('input-movie-title').value = title;
        document.getElementById('text-area-movie-description').value = description;
        document.getElementById('input-movie-year').value = year;
        document.getElementById('input-movie-rental-cost').value = rental_cost;
        document.getElementById('input-movie-duration').value = duration;
        document.getElementById('input-movie-replacement-cost').value = replacement_cost;
        document.getElementById('input-movie-clasification').value = clasification;
        document.getElementById('input-movie-extra-content').value = extra_content;
        document.getElementById('movie-language').value = language;
        document.getElementById('movie-edit-button').disabled = true;
        document.getElementById('input-movie-title').disabled = true;
        document.getElementById('text-area-movie-description').disabled = true;
        document.getElementById('input-movie-year').disabled = true;
        document.getElementById('input-movie-rental-cost').disabled = true;
        document.getElementById('input-movie-duration').disabled = true;
        document.getElementById('input-movie-replacement-cost').disabled = true;
        document.getElementById('input-movie-clasification').disabled = true;
        document.getElementById('input-movie-extra-content').disabled = true;
        document.getElementById('movie-language').disabled = true;
        $('#movie-edit-form-container').removeClass('disabled');
        $(this).addClass('hidden');
    });

    $(document).on('click', '#details-table-actors-container p', function() {
        if($('#details-table-actors-container').hasClass('closed')) {
            $('#details-table-actors-container').removeClass('closed');
            $('#details-table-stores-container').addClass('closed');
        };
    });

    $(document).on('click', '#details-table-stores-container p', function() {
        if($('#details-table-stores-container').hasClass('closed')) {
            $('#details-table-stores-container').removeClass('closed');
            $('#details-table-actors-container').addClass('closed');
        };
    });
});

$(window).on("load", function () {
    setTimeout(function () {
        $('.loader-container').fadeOut('slow')
    }, 1000);
});

function changePage(id, pageNumber, type, searchValue) {
    if($('#'+id).hasClass('active')) return false;
    $.ajax({
        url: type == 'actor' ? 'pages/actors/actors_table.php' : 'pages/movies/movies_table.php',
        type: 'GET',
        data: { 
            pagenumber: pageNumber,
            search: searchValue
        },
        success: function (response) {
            if(type == 'actor') {
                $('#actors-table').html(response);
                updatePaginator(pageNumber, 'actor', searchValue);
            } else {
                $('#movies-table').html(response);
                updatePaginator(pageNumber, 'movie', searchValue);
            }
            document.getElementById("input-search").value = searchValue;
        },
        error: function () {
            alert('Error updating table.');
        }
    });
}

function searchValue(value, type) {
    if(value != "" && value != null) {
        $.ajax({
            url: type == 'actor' ? 'pages/actors/actors_table.php' : 'pages/movies/movies_table.php',
            type: 'GET',
            data: { search: value },
            success: function (response) {
                if(type == 'actor') {
                    $('#actors-table').html(response);
                    updatePaginator(1, 'actor', value);
                } else {
                    $('#movies-table').html(response);
                    updatePaginator(1, 'movie', value);
                }
                document.getElementById("input-search").value = value;
            },
            error: function () {
                alert('Error updating table.');
            }
        });
    }
}

function cancelSearchValue(type) {
    $.ajax({
        url: type == 'actor' ? 'pages/actors/actors_table.php' : 'pages/movies/movies_table.php',
        type: 'GET',
        data: { 
            pagenumber: 1
        },
        success: function (response) {
            if(type == 'actor') {
                $('#actors-table').html(response);
                updatePaginator(1, 'actor');
            } else {
                $('#movies-table').html(response);
                updatePaginator(1, 'movie');
            }
        },
        error: function () {
            alert('Error updating table.');
        }
    });
}

function updatePaginator(currentPage, type, value) {
    $.ajax({
        url: type == 'actor' ? 'pages/actors/actors_paginator.php' : 'pages/movies/movies_paginator.php',
        type: 'GET',
        data: { 
            pagenumber: currentPage,
            search: value ? value : ""
        },
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
    document.getElementById("movie-language").value = language;
    document.getElementById("movie-form").action = "index.php?page=movies/movie_details";
    document.getElementById("movie-form").submit();
}

