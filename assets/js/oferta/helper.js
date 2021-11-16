let oferta = {

    init: () => {

        let Oferta = {
            edit_oferta: (id, id_customer, from, to, initial_value, amount, amount_type) => {
                $('#id_oferta').val(id);
                $('#id_customer').val(id_customer);
                $('#from').val(from);
                $('#to').val(to);
                $('#initial_value').val(initial_value);
                $('#amount').val(amount);
                $('#amount_type').val(amount_type);
                $('#cad_oferta').modal('show');
            },
            remove_oferta: (id) => {
                $.ajax({
                    type: 'POST',
                    url: '/goflux/delete_oferta/' + id,
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
        let datatable3 = {
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

        if (!$.fn.dataTable.isDataTable('#table2')) {
            $('#table1').DataTable().clear().destroy();
            $('#table3').DataTable().clear().destroy();
            $('#table1 thead').empty();
            $('#table3 thead').empty();
        }

        Oferta.datatable3 = $('table.display').DataTable({
            ...datatable3,
            ajax: '/goflux/table_oferta',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'id_customer'
                },
                {
                    data: 'from'
                },
                {
                    data: 'to'
                },
                {
                    data: 'initial_value'
                },
                {
                    data: 'amount'
                },
                {
                    data: 'amount_type'
                },
                {
                    orderable: false,
                    data: null,
                    render: function(data) {
                        return `
                            <div style="display:flex; align-items:center; width:100px; height:75px; overflow:auto;">
                            <button id="btn_edit_oferta" class="btn btn-icon edit" onclick="Oferta.edit_oferta('${data.id}','${data.id_customer}','${data.from}','${data.to}','${data.initial_value}','${data.amount}','${data.amount_type}')"><i class="fa fa-edit" title="Editar"></i></button>
                            <button id="btn_remove_oferta" class="btn btn-icon remove" onclick="Oferta.remove_oferta('${data.id}')"><i class="fa fa-times" title="Exlcuir"></i></button>
                            </div>
                            `;
                    },
                }
            ]
        });

        window.Oferta = Oferta;
    }
}

export default oferta;

$("#form_oferta").bind('submit', function(e) {

    e.preventDefault();

    var json = {
        'id': $('#id_oferta').val(),
        'id_customer': $('#id_customer').val(),
        'from': $('#from').val(),
        'to': $('#to').val(),
        'initial_value': $('#initial_value').val(),
        'amount': $('#amount').val(),
        'amount_type': $('#amount_type').val()
    };

    var formData = new FormData();
    formData.append('json', JSON.stringify(json));

    $.ajax({
        type: 'POST',
        url: '/goflux/save_oferta',
        dataType: 'html',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#cad_oferta').modal('hide');
            data = JSON.parse(data);
            console.log(data.json);
            $("table.display").DataTable().ajax.reload();
        },
        error: function(data, textStatus, errorThrown) {
            $('#cad_oferta').modal('hide');
            console.log('An error ocurred');
            console.log(textStatus);
            console.log(errorThrown);
        },
    });

});