$(document).ready(function () {
    
    $('#salvarfuncionariostatus').click(function () {
        var datastatus = $('#datastatus').val().split('/').reverse().join('-');
        var status_id = $('#status_id').val();
        var csrf_token = $('#csrf_token').val();
        if(datastatus === '') {
            $('.alert').show();
            $('.alert-message').text("A data não pode estar vazia");
            $('#datastatus').focus();
        }
        else if(status_id === '') {
            $('.alert').show();
            $('.alert-message').text("Selecione um status");
            $('#status_id').focus();
        }
        else {
            $.ajax({
                method: 'POST',
                url: '../controllers/FuncionarioStatusController.php',
                data: {'query': 'salvar', 'datastatus': datastatus, 'status_id': status_id, 'csrf_token':csrf_token},
                dataType: 'json'
            })
            .done(function (data) {
                if(data === true) {
                    window.location = "dashboard.php";
                }
                else {
                    $('.alert').show();
                    $('.alert-message').text("Erro ao salvar status");
                    $('#datastatus').focus();
                }
            });
        }
    });
    
});