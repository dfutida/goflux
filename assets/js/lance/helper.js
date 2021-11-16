let lance = {

    init: () => {

        let Lance = {
            edit_lance: (id, id_provider, id_offer, value, amountv) => {
                $('#id_lance').val(id);
                $('#id_provider').val(id_provider);
                $('#id_offer').val(id_offer);
                $('#value').val(value);
                $('#amountv').val(amountv);
                $('#cad_lance').modal('show');
            },
            remove_lance: (id) => {
                $.ajax({
                    type: 'POST',
                    url: '/goflux/delete_lance/' + id,
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
            }
        };

        //init datatable
        let datatable2 = {
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
            order: [0, "desc"],
        }

        if (!$.fn.dataTable.isDataTable('#table3')) {
            $('#table1').DataTable().clear().destroy();
            $('#table2').DataTable().clear().destroy();
            $('#table1 thead').empty();
            $('#table2 thead').empty();
        }

        Lance.datatable2 = $('table.display').DataTable({
            ...datatable2,
            ajax: '/goflux/table_lance',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'id_provider'
                },
                {
                    data: 'id_offer'
                },
                {
                    data: 'value'
                },
                {
                    data: 'amountv'
                },
                {
                    orderable: false,
                    data: null,
                    render: function(data) {
                        return `
                            <div style="display:flex; align-items:center; width:100px; height:75px; overflow:auto;">
                            <button id="btn_edit_lance" class="btn btn-icon edit" onclick="Lance.edit_lance('${data.id}','${data.id_provider}','${data.id_offer}','${data.value}','${data.amountv}')"><i class="fa fa-edit" title="Editar"></i></button>
                            <button id="btn_remove_lance" class="btn btn-icon remove" onclick="Lance.remove_lance('${data.id}')"><i class="fa fa-times" title="Exlcuir"></i></button>
                            </div>
                            `;
                    },
                }
            ]
        });

        window.Lance = Lance;
    }
}

export default lance;

$("#form_lance").bind('submit', function(e) {

    e.preventDefault();

    var json = {
        'id': $('#id_lance').val(),
        'id_provider': $('#id_provider').val(),
        'id_offer': $('#id_offer').val(),
        'value': $('#value').val(),
        'amountv': $('#amountv').val()
    };

    var formData = new FormData();
    formData.append('json', JSON.stringify(json));

    $.ajax({
        type: 'POST',
        url: '/goflux/save_lance',
        dataType: 'html',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#cad_lance').modal('hide');
            data = JSON.parse(data);
            console.log(data.json);
            $("table.display").DataTable().ajax.reload();
        },
        error: function(data, textStatus, errorThrown) {
            $('#cad_lance').modal('hide');
            console.log('An error ocurred');
            console.log(textStatus);
            console.log(errorThrown);
        },
    });

});