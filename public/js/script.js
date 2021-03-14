(function($) {

    // checkbox hide
    $('.checkbox').hide();

    // show genres
    $('.select-genre').on('click', function(){
    $('.checkbox').slideToggle();
});

    // close flash message
    $('.close').on('click', function () {
        $('.alert-success').fadeOut();
    });

    // caution messages - delete
    $('.delete-record').on('click', function () {
        return confirm('Are you sure?')
    });


    $('.sorting').footable();






}(jQuery));

