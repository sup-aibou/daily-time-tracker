<?php
require_once '../includes/header.php';
require_once '../includes/navigation.php';
require_once '../includes/sidebar.php';
?>

<div class="main">
    <h2>Create New Admin</h2>
    <?php if (isset($msg)) : ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>
    <form method="POST" action="../public/create_admin.php">
    <div class="mb-4">
        <label for="FullName" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="FullName" id="FullName" 
            class="w-full mt-1 p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
    </div>
    <button type="submit" 
        class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700">
        Add Admin
    </button>
</form>

</div>

<?php require_once '../includes/footer.php'; ?>
