<?php
namespace sapt17\Blogg ;

require "header.php";
$resultset = $app->session->get("resultset") ?? null;
if (!$resultset) {
    return;
}
?>

<table>
    <tr class="first">
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th>path</th>
        <th>slug</th>
        <th>Actions</th>

    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td>
            <form class="" action="edit?id=<?php echo $row->id ?>" method="post">
                <!-- <button type="submit" name="delId" value="<?= $row->id ?>"> Delete </button> -->
                <button type="submit" name="editId" value="<?= $row->id ?>"> Edit </button>
            </form>

            <form class="" action="delete" method="post">
                <button type="submit" name="delId" value="<?= $row->id ?>"> Delete </button>
                <!-- <button type="submit" name="editId" value="<?= $row->id ?>"> Edit </button> -->
            </form>

            <!-- <a class="icons" href="?route=edit&amp;id=<?= $row->id ?>" title="Edit this content">
                <i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i>
            </a>
            <a class="icons" method="post" name="delId" href="delete" value="<?= $row->id ?>" title="Delete this content">
                <i class="fa fa-trash-o" aria-hidden="true">Delete</i>
            </a> -->
        </td>
    </tr>
<?php endforeach; ?>
</table>
