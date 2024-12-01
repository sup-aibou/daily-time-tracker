<?php
// Include the functions file to access PHP logic
include('functions/display-record.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="src/output.css" rel="stylesheet">

</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Include Sidebar -->
        <?php
        $page = "manage-your-records";
        include 'sidebar.php'
        ?>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <header class="bg-white shadow p-4 mb-6">
                <h1 class="text-2xl font-semibold">Welcome to your records</h1>
            </header>

            <!-- Content Section -->
            <div class="bg-white shadow rounded p-6">
                <div class=" bg-white rounded p-6 border-2 m-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">edit</button>
                </div>
                <table class="table-auto ">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Time-in</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Time-out</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Hours Rendered</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Client</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Type of Work</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
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
</body>

</html>