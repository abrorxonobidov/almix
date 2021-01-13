$(document).ready(function () {
    $('#vmap').css(
        {
            'width': '658px',
            'height': '583px'
        }
    );

    $('.mapPoints a').click(function(e){
        e.preventDefault();
        $('#mapLabels').toggleClass('open');
    });

    $('.mapPoints a').hover(function(){
        filterRegions($(this).attr('href'));
    }, function(){
        filterRegions('');
    });
    $(window).click(function(e){
        // if(e.target.className.animVal != "jvectormap-region"){
        //     //console.log(e.target.className.animVal);
        //     $('#mapLabels').html('');
        // }
    });
});

var regions = {
    to: 0,
    qo: 0,
    an: 0,
    bu: 0,
    qa: 0,
    no: 0,
    gu: 0,
    sa: 0,
    fa: 0,
    ji: 0,
    na: 0,
    te: 0,
    xo: 0
};

function makeMap(details, colors) {
    showMapInfo(details['bu']);
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
        borderColor: '#74bdd0',
        borderWidth: 2,
        borderOpacity: 2,
        onRegionClick: function (element, code, region) {
            showMapInfo(details[code]);
        },
    });
    var current_code = "bu";
    $("#jqvmap1_"+current_code).attr("fill", "#00ccff");
}

function showMapInfo(regionInfo) {
    const item = regionInfo;
    if (typeof(item) !== 'undefined') {

        var template = ''+
            '<div class="reg_image">'+item['image']+'</div>'+
            '<div class="region_name">'+item['title']+'</div>'+
            '<div class="reg_address">'+item['address']+'</div>'+
        $('#mapLabels').html(template);
    } else {
        $('#mapLabels').html(`<h1>Topilmadi</h1>`);
    }
}