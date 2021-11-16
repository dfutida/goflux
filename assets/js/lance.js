import h from './lance/helper.js';

window.addEventListener('load', () => {

    $('#cad_lance').on('hidden.bs.modal', function() {
        $(this).find("input,textarea,select").val('').end();
        /*
        .find("input[type=checkbox], input[type=radio]")
        .attr("checked", true)
        .end();*/
    });

    h.init();

});