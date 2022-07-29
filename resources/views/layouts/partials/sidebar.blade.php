<!--- Sidemenu -->
<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span class="badge bg-success float-end">4</span>
            <span> Dashboards </span>
        </a>
        <div class="collapse" id="sidebarDashboards">
            <ul class="side-nav-second-level">
                <li>
                    <a href="dashboard-analytics.html">Analytics</a>
                </li>
                <li>
                    <a href="index.html">Ecommerce</a>
                </li>
                <li>
                    <a href="dashboard-projects.html">Projects</a>
                </li>
                <li>
                    <a href="dashboard-wallet.html">E-Wallet <span class="badge rounded bg-danger font-10 float-end">New</span></a>
                </li>
            </ul>
        </div>
    </li>

    <li class="side-nav-title side-nav-item">Cadastro</li>

    <li class="side-nav-item">
        <a href="{{ route('usuarios.index') }}" class="side-nav-link">
            <i class="uil-user"></i>
            <span> Usuários </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('products.index') }}" class="side-nav-link">
            <i class="uil-user"></i>
            <span> Produtos </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('categorias.index') }}" class="side-nav-link">
            <i class="uil-user"></i>
            <span> Categorias </span>
        </a>
    </li>



</ul>
<!-- End Sidebar -->
