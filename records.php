<?php
// Include the functions file to access PHP logic
include('functions/display-record.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>
    <div class="wrapper">
        <?php $page = "records";
        include 'includes/sidebar.php'; ?>

        <div class="main-panel">
            <?php include 'includes/header.php'; ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Records</h4>
                    </div>
                    <div class="page-category">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewDataModal">
                                        <span class="btn-label">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        Add
                                    </button>
                                    <button type="button" class="btn btn-info">
                                        <span class="btn-label">
                                            <i class="fa fa-info"></i>
                                        </span>
                                        Print
                                    </button>
                                </div>

                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time-in</th>
                                            <th scope="col">Time-out</th>
                                            <th scope="col">Hours Rendered</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Type of Work</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch the records and render table rows
                                        $records = fetchRecords($con);
                                        renderTableRows($records);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addNewDataModal" tabindex="-1" aria-labelledby="addNewDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form id="recordForm">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewDataModalLabel">Add New Record</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- First Column -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Select Date</label>
                                                <input
                                                    id="date"
                                                    type="date"
                                                    name="date"
                                                    class="form-control"
                                                    placeholder="Enter Name"
                                                    required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label for="time_in">Time in</label>
                                                <input
                                                    id="time_in"
                                                    type="time"
                                                    name="time_in"
                                                    class="form-control"
                                                    placeholder="Enter Name"
                                                    required />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label for="time_out">Time out</label>
                                                <input
                                                    id="time_out"
                                                    type="time"
                                                    name="time_out"
                                                    class="form-control"
                                                    placeholder="Enter Name"
                                                    required />
                                            </div>

                                        </div>
                                        <!-- Second Column -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Client's Name</label>
                                                <input
                                                    id="client"
                                                    type="text"
                                                    name="client"
                                                    class="form-control"
                                                    placeholder="Enter Name" />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Type of Work</label>
                                                <input
                                                    id="type_of_work"
                                                    type="text"
                                                    name="type_of_work"
                                                    class="form-control"
                                                    placeholder="What Work" />
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Select</label>
                                                <select class="form-select" id="status" name="status" required>
                                                    <option value="1">Pending</option>
                                                    <option value="2">Ongoing</option>
                                                    <option value="3">Completed</option>
                                                    <option value="4">Reschedule</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
        <script>
            document.getElementById('recordForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                const formData = new FormData(this); // Collect form data
                // Log each field name and value in FormData
for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
}

                fetch('functions/save-record.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json(); // Parse JSON response
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message); // Show success message
                            const modalElement = document.getElementById('addNewDataModal');
                            const modalInstance = bootstrap.Modal.getInstance(modalElement);
                            modalInstance.hide(); // Hide the modal
                            location.reload(); // Reload the page to reflect new data
                        } else {
                            alert(`Error: ${data.message}`); // Show error message
                        }
                    })

                    .catch(error => {
                        console.error(error);
                        alert('An unexpected error occurred.');
                    });
            });
        </script>
        <?php include 'includes/scripts.php'; ?>
</body>

</html>