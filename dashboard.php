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
		$page = "home";
	include 'sidebar.php'
	?>
        
        <!-- Main Content -->
        <div class="flex-1 p-4">
            <header class="bg-white shadow p-4 mb-6">
                <h1 class="text-2xl font-semibold">Welcome to the Dashboard</h1>
            </header>

            <!-- Content Section -->
            <div class="bg-white shadow rounded p-6">
                <p class="text-gray-700">Here is the main content of the dashboard.</p>
            </div>
        </div>
    </div>
</body>
</html>
