<?php

if(isset($_POST) &&  !empty($_POST))
{
    var_dump($_POST); die;
}

?>

<div class="row">

    <div class="row center-align">
        <h4>New Recipe </h4>
    </div>

    <div class="col s8 offset-s2">

        <form class="col s12" method="post" action="http://localhost/?recipe=insert">
            <div class="row">
                <div class="input-field col s6">
                    <input id="author" name="author" type="text" class="validate">
                    <label for="author">author name</label>
                </div>
                <div class="input-field col s6">
                    <input id="title" name="title" type="text" class="validate">
                    <label for="title">recipe name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="dish_type" name="dish_type" type="text" class="validate">
                    <label for="dish_type">Category</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="step1_title" name="step1_title" type="text" class="validate">
                    <label for="step1_title">Step 1 title</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="step1_desc" name="step1_desc" class="materialize-textarea" length="500"></textarea>
                    <label for="step1_desc">Step 1 description</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="step2_title" name="step2_title" type="text" class="validate">
                    <label for="step2_title">Step 2 title</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="step2_desc" name="step2_desc" class="materialize-textarea" length="500"></textarea>
                    <label for="step2_desc">Step 2 description</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="step3_title" name="step3_title" type="text" class="validate">
                    <label for="step3_title">Step 3 title</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="step3_desc" name="step3_desc" class="materialize-textarea" length="500"></textarea>
                    <label for="step3_desc">Step 3 description</label>
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>Images</span>
                    <input type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" name="images" type="text" placeholder="Upload one or more files">
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn amber darken-3 type="submit"><i class="material-icons left">done</i>Submit</button>
            </div>
        </form>

    </div>
</div>
