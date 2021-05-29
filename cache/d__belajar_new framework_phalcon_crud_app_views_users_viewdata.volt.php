<?php $v8696309641iterated = false; ?><?php $v8696309641iterator = $datas; $v8696309641incr = 0; $v8696309641loop = new stdClass(); $v8696309641loop->self = &$v8696309641loop; $v8696309641loop->length = count($v8696309641iterator); $v8696309641loop->index = 1; $v8696309641loop->index0 = 1; $v8696309641loop->revindex = $v8696309641loop->length; $v8696309641loop->revindex0 = $v8696309641loop->length - 1; ?><?php foreach ($v8696309641iterator as $data) { ?><?php $v8696309641loop->first = ($v8696309641incr == 0); $v8696309641loop->index = $v8696309641incr + 1; $v8696309641loop->index0 = $v8696309641incr; $v8696309641loop->revindex = $v8696309641loop->length - $v8696309641incr; $v8696309641loop->revindex0 = $v8696309641loop->length - ($v8696309641incr + 1); $v8696309641loop->last = ($v8696309641incr == ($v8696309641loop->length - 1)); ?><?php $v8696309641iterated = true; ?>
<?php if ($v8696309641loop->first) { ?>
<table border=1 align="center">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Phone</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
<?php } ?>
    <tbody>
        <tr>
            <td><?= $data->nik ?></td>
            <td><?= $data->name ?></td>
            <td><?= $data->sex ?></td>
            <td><?= $data->religion ?></td>
            <td><?= $data->phone ?></td>
            <td><?= $data->address ?></td>
            <td>
                <a href="<?= $this->url->get('users/edit/' . $data->id) ?>">Edit | </a>
                <a href="<?= $this->url->get('users/delete/' . $data->id) ?>">Delete</a>
            </td>
        </tr>
    </tbody>
<?php if ($v8696309641loop->last) { ?>
</table>
<?php } ?>
<?php $v8696309641incr++; } if (!$v8696309641iterated) { ?>
    No Data.
<?php } ?>