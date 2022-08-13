AOS.init();

jQuery(document).ready(function ($) {
    // get the values of the thing
    var options = $('[data-container="wpgmp-filters-container"] select option');
    var values = $.map(options, function (option) {
        return option.value;
    });

    // hide the
    $('.wpgmp_filter_wrappers').hide();

    var buttonHtml = '';
    $.each(values, function (i, val) {
        if (val.length) {
            buttonHtml =
                buttonHtml +
                '<button class="map-filter-type" data-type=' +
                val +
                '>' +
                val +
                '</button>';
        }
    });

    // add our new markup
    $('.wpgmp_filter_wrappers').after(
        '<div class="fancy-filters">' + buttonHtml + '</div>'
    );

    // $.each(values, function (i, val) {
    //     if (val.length) {
    //         $('.wpgmp_filter_wrappers').after(
    //             '<button class="map-filter-type" data-type=' +
    //                 val +
    //                 '>' +
    //                 val +
    //                 '</button>'
    //         );
    //     }
    // });

    $('.wpgmp_filter_wrappers').after('</div>');

    $('button.map-filter-type').on('click', updateFilters);

    function updateFilters() {
        var filterBy = $(this).attr('data-type');

        $('select[data-name="%attractiontypes%"]')
            .val(filterBy)
            .trigger('change');
    }
});
