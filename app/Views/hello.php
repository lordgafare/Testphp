<?= $this->include('Layouts/Navbar'); ?>

<h1>Hello</h1>

<form action="/pattern/generate" method="post">
        <label for="number">Enter Number:</label>
        <input type="text" id="number" name="number">
        <input type="submit" value="Send">
</form>
<pre><?= esc($pattern) ?></pre>
<?= $display ?>

<?= $this->include('Layouts/Footer'); ?>