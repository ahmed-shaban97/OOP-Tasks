<?php
require_once "Session.php";
Session::start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    Session::set('username', $name);
    Session::set('message', "Your name has been saved successfully!");
    header("Location: index.php");
    exit;

}

$message = Session::flash('message');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Session Class Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4 text-center">Session Class Test</h2>

                <?php if ($message): ?>
                <div class="alert alert-success text-center">
                    <?php echo $message; ?>
                </div>
                <?php endif; ?>

                <form method="post" action="" class="mb-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter your name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Type your name"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </form>

                <h5>Session Data:</h5>
                <pre class="bg-dark text-white p-3 rounded">
<?php print_r(Session::getAll()); ?>
                </pre>

                <p>
                    <?php 
                        if (Session::check('username')) {
                            echo "<strong>Your name is:</strong> " . Session::get('username');
                        } else {
                            echo "<strong>No username saved.</strong>";
                        }
                    ?>
                </p>

                <form method="post" action="remove.php" class="mt-3">
                    <button type="submit" class="btn btn-danger w-100">Clear all sessions</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>