<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Admin Dashboard</title>

    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styles for horizontal navigation */
        .navbar-custom {
            background-color: rgb(220, 53, 69);
            /* Navigation color */
        }

        .navbar-custom .nav-link {
            color: white;
            /* Make links white */
        }

        .navbar-custom .nav-link:hover {
            color: #f8f9fa;
            /* Lighter color on hover */
        }

        .navbar-custom .dropdown-menu {
            background-color: rgb(220, 53, 69);
            /* Dropdown background color */
        }

        .navbar-custom .dropdown-item {
            color: white;
            /* Dropdown text color */
        }

        .navbar-custom .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            /* Background hover effect */
        }
    </style>
</head>

<body>
    <!-- Horizontal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- User Management Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userManagementDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            User Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userManagementDropdown">
                            <li><a class="dropdown-item" href="{{ url('/admin/users') }}">User List</a></li>
                            <li><a class="dropdown-item" href="{{ url('/admin/roles') }}">Roles and Permissions</a></li>
                        </ul>
                    </li>

                    <!-- Project Management Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="projectManagementDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Project Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="projectManagementDropdown">
                            <li><a class="dropdown-item" href="{{ url('/admin/projects/new') }}">New Project</a></li>
                            <li><a class="dropdown-item" href="{{ url('/admin/projects/active') }}">Active Projects</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/admin/projects/archive') }}">Archive
                                    Projects</a></li>
                        </ul>
                    </li>

                    <!-- Reporting Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="reportingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Reporting
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="reportingDropdown">
                            <li><a class="dropdown-item" href="{{ url('/admin/reports/projects') }}">Project Reports</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/admin/reports/users') }}">User Reports</a></li>
                            <li><a class="dropdown-item" href="{{ url('/admin/reports/export') }}">Export Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mt-4">
        <h2>@yield('page-title')</h2>
        @yield('content')
    </div>

    <!-- Bootstrap 5.3.0 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
