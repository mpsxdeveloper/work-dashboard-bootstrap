function logout() {

    $.ajax({
        method: 'POST',
        url: '../controllers/FuncionarioController.php',
        dataType: 'json',
        data: {'query': 'logout'}
    }).done(function (data) {
        if (data === true) {
            window.location.href = "../index.php";
        }
    });

}