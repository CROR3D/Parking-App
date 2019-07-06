$(document).ready(function() {
    if(location.pathname.substr(1) === 'simulator') callContentSliders();

    dropdownParking();
    dashboardContent();
});

function callContentSliders() {
    $('.track-slider').animate({
      width: '100%',
      'opacity': '1'
    }, 1500);
    setTimeout(
      function() {
          $('.content-slider').animate({
            height: '100%',
            'opacity': '1'
          }, 1500);
     }, 1500);
}

function dropdownParking() {
    $("#select1").click(function(e) {
        e.preventDefault();

        if($(this).val() == '---') {
            $('#select2').prop("disabled", true);
        } else {
            $('#select2').prop("disabled", false);
        }
    });

    $("#select1").change(function() {
        if ($(this).data('options') === undefined) {
            $(this).data('options', $('#select2 option').clone());
        }

        var id = $(this).val();
        var options = $(this).data('options').filter('[value=' + id + ']');
        $('#select2').html(options).change();
    });

    $("#select2").change(function() {
        var slug = $('#select2').find(':selected').attr('name');
        $('button[name=selected]').val(slug);
    });
}

function dashboardContent() {
    $(".sw-content").click(function(e) {
        var parentId = e.target.parentNode.parentNode.id;
        var toggledContent = (parentId == 'user-info') ? 'app-analysis' : 'user-info';
        $(`#${parentId}`).fadeOut(1000);
        setTimeout(
          function() {
              $(`#${toggledContent}`).fadeIn(1000);
         }, 1000);
    });

    $(".profile-content").click(function(e) {
        var parentId = e.target.parentNode.parentNode.id;
        var toggledContent = (parentId == 'user-info') ? 'profile-info' : 'user-info';
        $(`#${parentId}`).fadeOut(1000);
        setTimeout(
          function() {
              $(`#${toggledContent}`).fadeIn(1000);
         }, 1000);
    });
}
