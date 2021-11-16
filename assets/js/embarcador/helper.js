let embarcador = {

    init: () => {

        let Embarcador = {
            edit_embarcador: (id, name, doc, about, active, site) => {
                active == 0 ? $('#active').removeAttr('checked') : $('#active').attr('checked', true);
                $('#id').val(id);
                $('#name').val(name);
                $('#doc').val(doc);
                $('#about').val(about);
                $('#site').val(site);
                $('#cad_embarcador').modal('show');
            },
            remove_embarcador: (id) => {
                $.ajax({
                    type: 'POST',
                    url: '/goflux/delete_embarcador/' + id,
                    dataType: 'html',
                    data: '',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("table.display").DataTable().ajax.reload();
                        data = JSON.parse(data);
                        alert(data.response);
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log('An error ocurred');
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                });
            },
            get_active: (active) => {
                active == 0 ? $('#active').removeAttr('checked') : $('#active').attr('checked', true);
            }
        };

        //init datatable
        let datatable1 = {
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"],
            ],
            responsive: true,
            serverSide: false,
            processing: true,
            autoWidth: true,
            paging: false,
            retrieve: true,
            order: [0, "desc"]
        }
        if (!$.fn.dataTable.isDataTable('#table1')) {
            $('#table2').DataTable().clear().destroy();
            $('#table3').DataTable().clear().destroy();
            $('#table2 thead').empty();
            $('#table3 thead').empty();
        }

        Embarcador.datatable1 = $('table.display').DataTable({
            ...datatable1,
            ajax: '/goflux/table_embarcador',
            cache: false,
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'doc'
                },
                {
                    data: 'about'
                },
                {
                    data: 'active'
                },
                {
                    data: 'site',
                    render: function(data) {

                        let link = '';

                        if (data === null) {
                            link = 'Sem site';
                        } else {
                            link = '<a href="' + data + '" target="_blank">' + data + '</a>';
                        }

                        return link;

                    }
                },
                {
                    orderable: false,
                    data: null,
                    render: function(data) {
                        return `
                            <div style="display:flex; align-items:center; width:100px; height:75px; overflow:auto;">
                            <button id="btn_edit_emb" class="btn btn-icon edit" onclick="Embarcador.edit_embarcador('${data.id}','${data.name}','${data.doc}','${data.about}','${data.active}','${data.site}')"><i class="fa fa-edit" title="Editar"></i></button>
                            <button id="btn_remove_emb" class="btn btn-icon remove" onclick="Embarcador.remove_embarcador('${data.id}')"><i class="fa fa-times" title="Exlcuir"></i></button>
                            </div>
                            `;
                    },
                }
            ]
        });

        window.Embarcador = Embarcador;

    }
}

export default embarcador;

$('#active').on('change', function() {
    $('#active').is(':checked') == 0 ? $('#active').removeAttr('checked') : $('#active').attr('checked', true);
});

$("#myform").bind('submit', function(e) {

    e.preventDefault();

    var status = $('#active').is(':checked') ? 1 : 0;

    var json = {
        'id': $('#id').val(),
        'name': $('#name').val(),
        'doc': $('#doc').val(),
        'about': $('#about').val(),
        'active': status,
        'site': $('#site').val()
    };

    var formData = new FormData();
    formData.append('json', JSON.stringify(json));

    $.ajax({
        type: 'POST',
        url: '/goflux/save_embarcador',
        dataType: 'html',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#cad_embarcador').modal('hide');
            data = JSON.parse(data);
            console.log(data.json);
            $("table.display").DataTable().ajax.reload();
        },
        error: function(data, textStatus, errorThrown) {
            $('#cad_embarcador').modal('hide');
            console.log('An error ocurred');
            console.log(textStatus);
            console.log(errorThrown);
        },
    });

});