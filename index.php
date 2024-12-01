<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>
    <div class="wrapper">
    <?php include 'includes/sidebar.php'; ?>

        <div class="main-panel">
            <?php include 'includes/header.php'; ?> 

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Pages</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Starter Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">Inner page content goes here</div>
                </div>
            </div>

            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>