<!-- #character-list-wrapper -->
<div id="character-list-wrapper">
    <h3>Members (<?php echo count($characters); ?>):</h3>
    <ul>
        <?php foreach ($characters as $character): ?>
        <li style="margin-bottom:5px"><a href="/character/profile/<?php echo $character['name'] ?>"><?php echo $character['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- /#login-form-wrapper -->