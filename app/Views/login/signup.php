<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> <!-- Ganti dengan path CSS Anda -->
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('gagal') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('sukses') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('register_action') ?>" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required class="form-control">
            </div>
            <div class="form-group">
                <label for="suplier">Supplier:</label>
                <input type="text" id="suplier" name="suplier" required class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already have an account? <a href="<?= base_url('login') ?>">Login here</a>.</p>
    </div>
</body>
</html>
