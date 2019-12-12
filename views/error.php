<?php if (displayError()): ?>
        <p><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION["error"]); ?>
<?php endif; ?>
