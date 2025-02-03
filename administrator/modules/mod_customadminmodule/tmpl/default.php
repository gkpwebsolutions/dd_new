<div class="custom-admin-module">
    <h3>Data from the Backend:</h3>
    <ul>
        <?php foreach ($data as $item): ?>
            <li><?php echo htmlspecialchars($item->name); ?></li>  <!-- Change 'title' to 'name' -->
        <?php endforeach; ?>
    </ul>
</div>
