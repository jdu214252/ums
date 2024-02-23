<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('styles.css')}}" />
    <title>Talabalar Davomat tizimi</title>
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="py-4 text-center sidebar-heading primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                class="fas fa-university me-2"></i>UNIVERSITET</div>
        <div class="my-3 list-group list-group-flush">
            <a href="{{route('students.index')}}" class="bg-transparent list-group-item list-group-item-action second-text active"><i
                    class="fas fa-university me-2"></i>Talabalar</a>
            <a href="{{route('teacher.index')}}" class="bg-transparent list-group-item list-group-item-action second-text fw-bold"><i
                    class="fas fa-university me-2"></i>O'qituvchilar</a>
            <a href="{{route('groups.index')}}" class="bg-transparent list-group-item list-group-item-action second-text fw-bold"><i
                    class="fas fa-university me-2"></i>Guruhlar</a>
            <a href="{{route('subject.index')}}" class="bg-transparent list-group-item list-group-item-action second-text fw-bold"><i
                    class="fas fa-book me-2"></i>Fanlar</a>
            <a href="#" class="bg-transparent list-group-item list-group-item-action text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Tizimdan chiqish</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="px-4 py-4 bg-transparent navbar navbar-expand-lg navbar-light">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h3 class="m-0 fs-4">TALABALAR DAVOMAT TIZIMI</h3>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>Superadmin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="px-4 container-fluid">

            @yield('content')

        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>
