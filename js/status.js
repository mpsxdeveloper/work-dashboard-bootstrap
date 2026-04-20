$(document).ready(function () {
    
    $('#salvarstatus').click(function () {
        var descricao = $('#descricao').val().trim().toUpperCase();
        var csrf_token = $('#csrf_token').val();
        if(descricao === '') {
            $('.alert').show();
            $('.alert-message').text("Informe a descrição do status");
            $('#descricao').focus();
        }        
        else {
            $.ajax({
                method: 'POST',
                url: '../controllers/StatusController.php',
                data: {'query': 'salvar', 'descricao': descricao, 'csrf_token':csrf_token},
                dataType: 'json'
            })
            .done(function (data) {
                if(data === true) {
                    window.location = "dashboard.php";
                }
                else {
                    $('.alert').show();
                    $('.alert-message').text("Erro. Verifique se já existe esse status");
                    $('#descricao').focus();
                }
            });
        }
    });
    
});
    
function listar() {
    $.ajax({
        method: 'POST',
        url: '../controllers/StatusController.php',
        data: {'query': 'listar'},
        dataType: 'json'
    }).done(function (data) {
        $.each(data, function (index, element) {
            $('#status_id').append($("<option />").val(element["id"]).text(element["descricao"]));
        });
    });
}