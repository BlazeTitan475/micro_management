<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Area - Project Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> --}}
    <style>
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .emoji-badge {
            font-size: 1.2em;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🏢 Client Area</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="login.html">🚪 Logout</a>
            </div>
        </div>
    </nav>
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <!-- Position it: -->
        <!-- - `.toast-container` for spacing between toasts -->
        <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
        <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
        <div class="toast-container top-0 end-0 p-3 show">

            <!-- Then put toasts within -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Bootstrap</strong>
                    <small class="text-body-secondary">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    See? Just like this.
                </div>
            </div>

            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Bootstrap</strong>
                    <small class="text-body-secondary">2 seconds ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Heads up, toasts will stack automatically
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <!-- Urgent Notices -->
                <div class="card mb-4 border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h3>⚠️ Urgent Notices</h3>
                    </div>
                    <div class="card-body">
                        @if ($urgentRequests->isEmpty())
                            <p>No urgent notifications at the moment.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($urgentRequests as $request)
                                    <li class="list-group-item">
                                        <div
                                            class="alert alert-warning d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="emoji-badge">🔔</span>
                                                <strong>Pending Request:</strong>
                                                {{ $request->message }} <br>
                                            </div>
                                            <form action="{{ route('requests.updateStatus', $request->id) }}"
                                                method="POST" class="ms-auto">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary mt-2">
                                                    Respond to Request
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="alert alert-info d-flex align-items-center">
                            <span class="emoji-badge">📬</span>
                            <div>
                                <strong>New Communication:</strong> You have a new message from the development team.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Details -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h3>📊 Project Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center mb-3 bg-light">
                                    <div class="card-header">⏱️ Hours Worked</div>
                                    <div class="card-body">
                                        <h2 class="card-title">42 <small class="text-muted">hours</small></h2>
                                        <p class="card-text text-muted">Total hours spent</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center mb-3 bg-light">
                                    <div class="card-header">📈 Progress Status</div>
                                    <div class="card-body">
                                        <h2 class="card-title">60<small class="text-muted">%</small></h2>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="card-text text-muted mt-2">Overall progress</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center mb-3 bg-light">
                                    <div class="card-header">🕒 Project Deadline</div>
                                    <div class="card-body">
                                        <h2 class="card-title">45 <small class="text-muted">days</small></h2>
                                        <p class="card-text text-muted">Time remaining</p>
                                        <small class="text-muted">Delivery: 31/10/2023</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Tasks -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h3>📋 Ongoing Tasks</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="taskTable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Request Response</td>
                                    <td>Clarification on dashboard functionality</td>
                                    <td><span class="badge bg-warning">🟡 Medium</span></td>
                                    <td><span class="badge bg-info">⏳ Pending</span></td>
                                    <td>2023-08-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Support Ticket -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>🎫 Support Ticket</h3>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#newTicketModal"
                            id="newTicketBtn">
                            + New
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="list-group" id='ticketsList'>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">🖥️ Interface Issue</h5>
                                    <small>🟡 In Progress</small>
                                </div>
                                <p class="mb-1">Difficulty using some features</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Ticket Modal -->
    <div class="modal fade" id="newTicketModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">🎫 New Support Ticket</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="ticketForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">🏷️ Subject</label>
                            <input type="text" class="form-control" name='subject' required>
                        </div>
                        <div class="mb-3">
                            <label for="operator" class="form-label">Assign to Operator</label>
                            <select name="operator_id" id="operator" class="form-select">
                                <option value="">Select an Operator</option>
                                <!-- Operators will be loaded here dynamically -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">📝 Description</label>
                            <textarea class="form-control" rows="4" name='description' required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">🚨 Priority</label>
                            <select class="form-select">
                                <option value="low">🟢 Low</option>
                                <option value="medium">🟡 Medium</option>
                                <option value="high">🔴 High</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="footer text-center">
        <p>&copy; 2024 Project Management System | All rights reserved.</p>
    </div>
    <!-- jQuery CDN (Google) -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function tickets_show_all() {
            $.ajax({
                url: "{{ route('tickets.show_all') }}", // Your route to store the request
                type: "GET",
                success: function(response) {
                    if (response.success) {
                        $('#newTicketModal').modal('hide'); // Hide the modal
                        // You can also update the UI without reloading
                        $('#ticketsList').empty();
                        response.data.forEach(function(request) {
                            $('#ticketsList').append(
                                `<a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">🖥️ ${request.subject}</h5>
                                            <small>🟡 In Progress</small>
                                        </div>
                                        <p class="mb-1">${request.description}</p>
                                    </a>`
                            );
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("XHR object:", xhr);
                    console.log("Status:", status);
                    console.log("Error:", error);
                    alert("An error occurred: " + error);
                }
            });
        }
        tickets_show_all();

        function onSendSupportTicket() {
            $("#ticketForm").on("submit", function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('tickets.store') }}", // Your route to store the request
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message); // Display success message
                            $('#newTicketModal').modal('hide'); // Hide the modal
                            tickets_show_all();
                        } else {
                            alert("Something went wrong!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert("An error occurred.");
                    }
                });

            });
        }

        $(document).ready(function() {
            // Open the modal and fetch operators
            $('#newTicketBtn').on('click', function() {
                // Open the modal
                $('#newTicketModal').modal('show');

                // Fetch operators from the server
                $.ajax({
                    url: '{{ route('operators.list') }}',
                    method: 'GET',
                    success: function(data) {
                        // Clear the existing options
                        $('#operator').empty();
                        $('#operator').append(
                            '<option value="">Select an Operator</option>');

                        // Append each operator to the dropdown
                        data.forEach(function(operator) {
                            $('#operator').append(
                                `<option value="${operator.id}">${operator.name}</option>`
                            );
                        });
                    },
                    error: function() {
                        alert('Failed to load operators.');
                    }
                });
            });

            onSendSupportTicket();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
