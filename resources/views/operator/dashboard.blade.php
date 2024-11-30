<!DOCTYPE html>
<html lang="en"> <!-- Changed "it" (Italian) to "en" (English) -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Project Management</title> <!-- "Gestionale Progetti" means "Project Management" -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🏢 Operator Dashboard</a>
            <!-- "Dashboard Operatore" means "Operator Dashboard" -->
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="freelancer-page.html">📋 Project Management</a>
                <!-- "Gestione Progetti" means "Project Management" -->
                <a class="nav-link" href="login.html">🚪 Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card dashboard-card mb-4" onclick="window.location.href='{{ route('operator.area', 0) }}'">
                    <div class="card-body text-center">
                        <h3 class="card-title">🚀 Active Projects</h3>
                        <!-- "Progetti Attivi" means "Active Projects" -->
                        <div class="display-4 text-primary">{{ $activeProjectsCount }}</div>
                        <p class="text-muted">Projects under development</p>
                        <!-- "Progetti in corso di sviluppo" means "Projects under development" -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card mb-4" onclick="window.location.href='freelancer-page.html'">
                    <div class="card-body text-center">
                        <h3 class="card-title">📋 Open Tasks</h3> <!-- "Task Aperti" means "Open Tasks" -->
                        <div class="display-4 text-warning">12</div>
                        <p class="text-muted">Tasks in progress</p>
                        <!-- "Task in elaborazione" means "Tasks in progress" -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card mb-4" onclick="window.location.href='freelancer-page.html'">
                    <div class="card-body text-center">
                        <h3 class="card-title">👥 Communications</h3> <!-- "Comunicazioni" means "Communications" -->
                        <div class="display-4 text-success">5</div>
                        <p class="text-muted">Unread communications</p>
                        <!-- "Comunicazioni non lette" means "Unread communications" -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>📊 Project Status</h3> <!-- "Stato Progetti" means "Project Status" -->
                    </div>
                    <div class="card-body">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Culture Digital Management
                                (60%) <!-- "Gestionale Culture Digitali" means "Culture Digital Management" -->
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Corporate Web App (40%)
                                <!-- "Web App Aziendale" means "Corporate Web App" -->
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20"
                                aria-valuemin="0" aria-valuemax="100">Mobile Application (20%)
                                <!-- "Applicazione Mobile" means "Mobile Application" -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>⏰ Upcoming Deadlines</h3> <!-- "Scadenze Imminenti" means "Upcoming Deadlines" -->
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dashboard Development <!-- "Sviluppo Dashboard" means "Dashboard Development" -->
                                <span class="badge bg-danger">In 7 days</span> <!-- "Tra 7 giorni" means "In 7 days" -->
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Functionality Testing <!-- "Test Funzionalità" means "Functionality Testing" -->
                                <span class="badge bg-warning">In 15 days</span>
                                <!-- "Tra 15 giorni" means "In 15 days" -->
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Project Delivery <!-- "Consegna Progetto" means "Project Delivery" -->
                                <span class="badge bg-success">In 30 days</span>
                                <!-- "Tra 30 giorni" means "In 30 days" -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-4 bg-light py-3">
        <div class="container text-center">
            <p>© 2023 Culture Digitali SRL - Project Management
                <!-- "Gestionale Progetti" means "Project Management" -->
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
