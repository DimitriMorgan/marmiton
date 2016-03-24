<?php

$recipes = json_decode($options);

foreach($recipes as $key => $recipe)
{
    ?>

    <div class="col s6 m4 l3">
        <div class="card medium z-depth-2">
            <div class="card-image waves-effect waves-block waves-light">
<!--                <img class="activator" src="assets/images/food-art2.jpg">-->
                <span class="activator amber accent-1" style="display:block; height:240px; width:100%;">image pété</span>
            </div>

            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">

                    <div class="row">
                        <div class="col s9">
                            <a href="http://localhost/?recipe=<?php echo $recipe->id ?>">
                                <?php echo $recipe->title; ?>
                            </a>
                        </div>
                        <div class="col s3">
                            <a class="waves-effect waves-light btn btn-floating right blue-grey darken-1">
                                <i class="material-icons left">search</i>
                                Voir
                            </a>
                        </div>
                    </div>
                </span>
            </div>

            <div class="card-action">
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
            </div>

            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">
                    <?php echo $recipe->title; ?>
                    <i class="material-icons right">close</i>
                </span>

                <hr>

                <div class="row">
                    <div class="chip">
                        <i class="material-icons">account_circle</i>
                        <?php echo $recipe->author; ?>
                    </div>
                    <div class="chip">
                        <i class="material-icons">query_builder</i>
                        <?php echo $recipe->updated_at; ?>
                    </div>
                </div>

                <div class="row">
                    Category:
                    <hr>
                    <div class="chip">
                        <?php echo $recipe->dish_type; ?>
                    </div>
                </div>

                <div class="row">
                    Tags:
                    <hr>
                    <?php
                    foreach($recipe->tags as $tag)
                    {
                        echo '<div class="chip">';
                        echo $tag;
                        echo '</div>';
                    }

                    ?>
                </div>


                <div class="center-align">
                    <a href="http://localhost/?recipe=<?php echo $recipe->id ?>" class="waves-effect waves-light btn">
                        <i class="material-icons left">search</i>
                        View Recipe
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>
