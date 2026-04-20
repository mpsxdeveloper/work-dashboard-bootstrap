<ul class="nav navbar-primary bg-light nav-pills mt-1 text-light fw-bold" style="border: 0;">
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'dashboard' ? 'active' : '' ?>" href="dashboard.php">
            <i class="bi bi-person-workspace"></i> Dashboard
        </a>
    </li>  
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'status' ? 'active' : '' ?>" href="funcionarios_status.php">
            <i class="bi bi-info-circle-fill"></i> Meu Status
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'perfil' ? 'active' : '' ?>" href="perfil.php">
            <i class="bi bi-person-badge-fill"></i> Meu Perfil
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'setores' ? 'active' : '' ?>" href="setores.php">
            <i class="bi bi-building"></i> Setores
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'funcionarios' ? 'active' : '' ?>" href="funcionarios.php">
            <i class="bi bi-people-fill"></i> Funcionários
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $pagina == 'novostatus' ? 'active' : '' ?>" href="status.php">
            <i class="bi bi-info-square-fill"></i> Status
        </a>
    </li>
</ul>