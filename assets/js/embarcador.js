import b from './embarcador/helper.js';

window.addEventListener('load', () => {

    $('#cad_embarcador').on('hidden.bs.modal', function() {
        $(this).find("input,textarea,select").val('').end();
        /*
        .find("input[type=checkbox], input[type=radio]")
        .attr("checked", true)
        .end();*/
        $('#active').attr('checked', true);
        $('#active').removeAttr('value');
    });

    $('#btn_edit_emb').click(() => {
        data.active == 0 ? $('#active').removeAttr('checked') : $('#active').attr('checked', true);
    });

    b.init();

});