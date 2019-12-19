<?php if (displayError()): ?>
        <p class="error-message"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION["error"]); ?>
<?php endif; ?>
