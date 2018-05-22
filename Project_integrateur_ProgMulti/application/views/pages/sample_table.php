<?php if(isset($title) && !empty($title)) : ?>
    <h1><?php echo $title; ?></h1>
<?php endif; ?>

<?php if(isset($list) && count($list)) : ?>
    <table>
        <thead>
            <tr>
            	<th>Réponse</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo $list['rep']; ?></td>
                </tr>
        </tbody>
    </table>
<?php else : ?>
    <h3>No results found!</h3>
<?php endif; ?>
