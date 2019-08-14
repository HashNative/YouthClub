
<body id="page-top">

<nav class="navbar fixed-top navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">Young Flower</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <form role="form" action="<?php echo base_url('incomeexpense/create'); ?>" method="POST">
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <input type="hidden" id="type" name="type" value="Fine">
                <input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d");?>">
                <input type="hidden" id="description" name="description" value="Fine">
                <input type="hidden" id="amount" name="amount" value="<?php echo $fine; ?>">
<!--                <a class="dropdown-item" href="#">Fine amount of --><?php //echo $fine; ?><!-- for Member - 01 should be applied. <button type="submit" class="btn btn-warning">Apply</button> </a>-->
<!--                <div class="dropdown-divider"></div>-->

            </div>
            </form>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>" >Logout</a>
            </div>
        </li>
    </ul>

</nav>
