<form method="post" action="<?= site_url('doc') ?>">
    <label for="prefix">Prefix:</label>
    <input type="text" name="prefix" id="prefix" required />

    <label for="suffix">Suffix (Date):</label>
    <input type="text" name="suffix" id="suffix" required />

    <label for="digits">Number of Digits:</label>
    <input type="number" name="digits" id="digits" required />

    <label for="number">Number:</label>
    <input type="number" name="number" id="number" required />

    <input type="submit" value="Generate Document Number" />
</form>

<?php if (isset($documentNumber)): ?>
    <p>Generated Document Number: <?= esc($documentNumber) ?></p>
<?php endif; ?>