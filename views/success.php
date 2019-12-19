<?php if (displaySuccess()): ?>
        <p class="success-message"><?php echo $_SESSION['success']; ?></p>
        <?php unset($_SESSION["success"]); ?>
<?php endif; ?>
