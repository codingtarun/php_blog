<?php
include 'includes/Loader.php';

use Controller\Session as Session;
use Helper\Sanitizer as Sanitizer;

use Model\Blog as Blog;

$blogObj = new Blog($con);



if (!isset($_SESSION['username'])) {
    Session::logout();
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    Session::logout();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = Sanitizer::title($_POST["title"]);
    $excrept = Sanitizer::text($_POST["excrept"]);
    $body = Sanitizer::text($_POST["body"]);
    $user_id = 23;
    $status = $_POST["status"];
    $blogObj->store($title, $excrept, $body, $status, $user_id);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            $blogObj->delete($id);
            break;
        case 'edit':
            $roleEdit = $roleObj->edit($id);
            break;
        case 'status':
            $blogObj->status($id);
            break;
        default:
            echo "ERROR";
    }
}

$blogs = $blogObj->viewAll();
?>


<body>

    <?php
    include 'includes/partials/nav-header.php';
    ?>

    <?php
    include 'includes/partials/aside.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Blog</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Create new blog</h5>

                                <!-- General Form Elements -->
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="row mb-3">
                                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                            <?php
                                            echo $blogObj->getError(Helper\Error::$invalidTitleLength);
                                            echo $blogObj->getError(Helper\Error::$titleAlreadyExist);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="excrept" class="col-sm-3 col-form-label">Excrept</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height: 100px" name="excrept" id="excrept"></textarea>
                                            <?php
                                            echo $blogObj->getError(Helper\Error::$excreptError);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="body" class="col-sm-3 col-form-label">Body</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height: 800px" name="body" id="body"></textarea>
                                            <?php
                                            echo $blogObj->getError(Helper\Error::$textLengthTooLong);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status" id="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>

                                </form><!-- End General Form Elements -->

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Roles</h5>
                            <!-- Default Table -->
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //echo $role->viewAll(); 
                                    $i = 1;
                                    while ($blog = $blogs->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                        <tr>
                                            <td> <?php echo $i; ?> </td>
                                            <td><?php echo $blog->title; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $blog->id; ?>&action=status" class="btn btn-info"><?php echo $blogObj->getStatus($blog->status); ?></a>
                                                    <a href="blog_edit.php?id=<?php echo $blog->id; ?>&action=edit" class="btn btn-warning">Edit</button>
                                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $blog->id; ?>&action=delete" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div><!-- End Left side columns -->

                <?php
                include 'includes/partials/right-aside.php';
                ?>


            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php
    include 'includes/partials/footer-scripts.php';
    ?>

</body>

</html>