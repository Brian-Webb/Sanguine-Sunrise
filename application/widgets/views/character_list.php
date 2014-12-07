<h3>Characters (<?php echo count($characters); ?>):</h3>
        <ul>
            <?php foreach ($characters as $character): ?>
            <li><a href="/character/profile/<?php echo $character['name'] ?>"><?php echo $character['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>