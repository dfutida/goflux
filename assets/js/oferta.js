import c from './oferta/helper.js';

window.addEventListener('load', () => {

    $('#cad_oferta').on('hidden.bs.modal', function() {
        $(this).find("input,textarea,select").val('').end();
        /*
        .find("input[type=checkbox], input[type=radio]")
        .attr("checked", true)
        .end();*/
    });

    c.init();

});