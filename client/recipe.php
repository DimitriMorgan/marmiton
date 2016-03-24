<?php
    $recipe = json_decode($options);
?>

<div class="row">
    <div class="col s8 offset-s2">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Recipe details:</span>

                <div class="row">
                    <p>category:</p>
                    <p><?php echo $recipe->dish_type; ?></p>
                </div>

                <div class="row">
                    <?php
                    foreach($recipe->tags as $tag)
                    {
                        echo '<div class="chip">';
                        echo $tag;
                        echo '</div>';
                    }

                    ?>
                </div>

                <table>
                    <tbody>
                    <tr>
                        <td>title:</td>
                        <td><?php echo $recipe->title; ?></td>
                    </tr>
                    <tr>
                        <td>author:</td>
                        <td><?php echo $recipe->author; ?></td>
                    </tr>
                    <tr>
                        <td>mail:</td>
                        <td><?php echo $recipe->mail; ?></td>
                    </tr>

                    <tr>
                        <td>created_at:</td>
                        <td><?php echo $recipe->created_at; ?></td>
                    </tr>
                    <tr>
                        <td>updated_at:</td>
                        <td><?php echo $recipe->updated_at; ?></td>
                    </tr>
                    <tr>
                        <td>steps:</td>
                        <td><?php echo $recipe->steps; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-action">
                <a class="waves-effect waves-light btn amber darken-3" href="http://localhost/">home</a>
            </div>
        </div>
    </div>
</div>
