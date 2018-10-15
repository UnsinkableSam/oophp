<?php
namespace sapt17\Blogg ;

// require "../src/TextFilter/TxtFilter.php";
// require "../router/008_blogg.php";
require "header.php";




?>

<form action="edit" method="post">
    <fieldset>
    <legend>Create</legend>

    <p>
        <label>Title:<br>
        <input type="text" name="contentTitle" default="A Title"/>
        </label>
    </p>

    <p>


        <button type="submit" name="doCreate" value="doCreate"><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
    </p>
    </fieldset>
</form>
