<?php if (displaySuccess()): ?>
        <p><?php echo $_SESSION['success']; ?></p>
        <?php unset($_SESSION["success"]); ?>
<?php endif; ?>
