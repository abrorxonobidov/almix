let mapRoot = $('#vmap');

makeMap = (details) => {
    console.log('test');
    console.log(details);
    let current_code = 'tosh';
    showMapInfo(details[current_code], current_code);
    mapRoot.html('');
    $('.jqvmap-label').remove();
    mapRoot.vectorMap({
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
        onRegionClick: (element, code) => {
            showMapInfo(details[code], code);
        },
    });
    $("#jqvmap1_" + current_code).attr("fill", "#00ccff");
};

showMapInfo = (item, code) => {
    let htmlView = $('<div />'),
        modalLink = '',
        regName = '',
        regDiv = $('<div />', {class: 'reg_image'}),
        image = $('<span />', {class: 'reg_image_in', html: '<img src="/img/hourglass.png" alt="" />'}),
        regAddress = $('<div />', {
            class: 'reg_address',
            html: 'Tez kunlarda ushbu hududda savdo doʻkonimiz oʻz faoliyatini boshlaydi'
        });
    if (typeof (item) !== 'undefined') {
        image = $('<span />', {
            class: 'reg_image_in',
            html: item['image']
        });
        modalLink = $('<a />', {
            class: 'modal_zoom',
            //'data-toggle': "modal",
            //'data-target': "#region-modal",
            //onclick: (code) => showModal(code),
            'data-code': code
        }).on('click', e => showModal($(e.target).data('code')));
        regName = $('<div />', {
            class: 'region_name',
            html: item['title']
        });
        regAddress = $('<div />', {
            class: 'reg_address',
            html: item['address']
        });
    }
    regDiv.append(image);
    regDiv.append(modalLink);
    htmlView.append(regDiv);
    htmlView.append(regName);
    htmlView.append(regAddress);
    $('#mapLabels').html(htmlView);
};

showModal = code => {
    console.log(code);
    $('#region-modal').modal('show');
    $('#region-modal').find('.modal-body').html(code)
};