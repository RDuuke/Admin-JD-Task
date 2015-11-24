$('#clientes').change(function (event) {
    $('.tbody').empty();
    $.get('clientes/' + event.target.value + "", function (response, tareas) {
        console.log(response);
        for(i = 0; i < response.length; i++){
            $('.tbody').append(
                '<tr>' +
                    '<td>' + response[i].id + '</td>' +
                    '<td>' + response[i].usuario + '</td>' +
                    '<td>' + response[i].name  + '</td>' +
                    '<td>' + response[i].descripcion  + '</td>' +
                    '<td>' + response[i].fecha_tarea  + '</td>' +
                    '<td>' + response[i].tiempo  + '</td>' +
                '</tr>'
            )
        }
    })
});
$('#usuarios').change(function (event) {
    $('.tbody').empty();
    $.get('usuarios/' + event.target.value + "", function (response, tareas) {
        console.log(response);
        for(i = 0; i < response.length; i++){
            $('.tbody').append(
                '<tr>' +
                '<td>' + response[i].id + '</td>' +
                '<td>' + response[i].usuario + '</td>' +
                '<td>' + response[i].name  + '</td>' +
                '<td>' + response[i].descripcion  + '</td>' +
                '<td>' + response[i].fecha_tarea  + '</td>' +
                '<td>' + response[i].tiempo  + '</td>' +
                '</tr>'
            )
        }
    })
});