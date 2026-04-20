$(document).ready(function () {

    $.ajax({
        method: 'POST',
        url: '../controllers/FuncionarioStatusController.php',
        data: {'query': 'listar', 'setor_id': $('#setor_id').val()},
        dataType: 'json'
        }).done(function (data) {
            if(data === '') {
                $('#pesquisa').focus();
            }
            else {
                $("#dashboard tbody tr").remove();
                $.each(data, function (index, element) {
                    $('#dashboard').append('<tr>'
                    + '<td>' + '<img src="../imagens/'+`${element['foto']}`+'" width="40" height="40" />' + '</td>'
                    + '<td>' + element['nome'] + '</td>'
                    + '<td>' + element['descricao'] + '</td>'                    
                    + '</tr>');
                });
            }
        });

});
