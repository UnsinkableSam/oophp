<?php
namespace sapt17\Blogg ;

require "../src/TextFilter/TxtFilter.php";
require "header.php";
$txtFilter = new TxtFilter();

?>
<form action="admin" method="post">
    <fieldset>
    <legend>Delete</legend>

    <input type="hidden" name="contentId" value="<?=  $txtFilter->parse($content->id, $content->filter) ?>"/>

    <p>
        <label>Title:<br>
            <input type="text" name="contentTitle" value="<?= $txtFilter->parse($content->title, $content->filter) ?>" readonly/>
        </label>
    </p>

    <p>
        <button type="submit" name="doDelete" value="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
