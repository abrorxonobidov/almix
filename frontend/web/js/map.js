$(document).ready(function () {
    $('.mapPoints a').click(function(e){
        e.preventDefault();
        $('#mapLabels').toggleClass('open');
    });

    $('.mapPoints a').hover(function(){
        filterRegions($(this).attr('href'));
    }, function(){
        filterRegions('');
    });
});

function makeMap(details, colors) {
    showMapInfo(details['no']);
    $('#vmap').html('');
    $('.jqvmap-label').remove();
    $('#vmap').vectorMap({
        map: 'uzbekistan',
        backgroundColor: '',
        color: '#b9f0ff',
        hoverColor: '#00b8eb',
        selectedColor: '#00ccff',
        enableZoom: false,
        showTooltip: false,
        borderColor: '#86c8d9',
        borderWidth: 1,
        borderOpacity: 1,
        onRegionClick: function (element, code, region) {
            showMapInfo(details[code]);
        },
    });
    var current_code = "no";
    $("#jqvmap1_"+current_code).attr("fill", "#00ccff");
}

function showMapInfo(regionInfo) {
    const item = regionInfo;
    if (typeof(item) !== 'undefined') {

        var template = ''+
            '<div>'+
                '<div class="reg_image"><span class="reg_image_in">'+item['image']+'</span><span class="modal_zoom" data-toggle="modal" data-target="#myModal"></span></div>'+
                '<div class="region_name">'+item['title']+'</div>'+
                '<div class="reg_address">Manzil: '+item['address']+'</div>'+
            '</div>';
        $('#mapLabels').html(template);
    } else {
        $('#mapLabels').html(`<h1>Topilmadi</h1>`);
    }
}