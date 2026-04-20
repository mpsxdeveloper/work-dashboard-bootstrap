<div class="container bg-primary text-white text-center fw-bold fs-1 p-2">
    <input type="hidden" id="setor_id" value="<?=$_SESSION['setor_id']?>" />
    <div class="row">
        <div class="col-3 text-end mt-1">
            <a href="dashboard.php" style="text-decoration: none;" class="text-light">
                <span class="fs-4 text-center">
                    <i class="bi bi-person-lines-fill"></i> Work Dashboard
                </span>
            </a>
        </div>
        <div class="col-5 text-end mt-2">
            <span class="float-right text-light fs-6"><?= $_SESSION["nome"]?></span>
        </div>
        <div class="col-4 text-end mt-1">
            <button type="button" class="btn btn-danger" onclick="logout();">
                <i class="bi bi-door-open-fill"></i> Sair
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 fs-5">
            <span id="setor_nome"></span>
            <span id="time"></span> <i class="bi bi-smartwatch text-dark"></i>
        </div>
    </div>
</div>

<script>
    let now = new Date().toLocaleString();
    $('#time').text(now);
    setInterval(function() {
        now = new Date().toLocaleString();
        $('#time').text(now);
    }, 1000);
    
    $.ajax({
        method: 'POST',
        url: '../controllers/SetorController.php',
        data: {'query': 'get', 'setor_id': $('#setor_id').val()},
        dataType: 'json'
        }).done(function (data) {
            if(data !== '') {
                $('#setor_nome').text(data.nome);
            }
        });

</script>

<script src="../js/logout.js"></script>