<?php require APPROOT . '/views/inc/header.php'; ?> <!-- header needs to be changed to size view-->

<h1>ADMIN MENU PAGE</h1>

<section class="card-section pt-4 mx-4">
    <div class="my-5 mx-3">
        <h2>Menu</h2>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">
                <span class="material-symbols-outlined"> more_horiz </span>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $table = '';
        foreach ($data['menu'] as $item) {
            $table .= '<tr>';
            $table .= '<td>' . $item->id . '</td>';
            $table .= '<td>' . $item->photo . '</td>'; //Image Broken at the moment
            $table .= '<td>' . $item->name . '</td>';
            $table .= '<td>' . "$" . $item->price . '</td>';
            $table .= '<td>' . $item->description . '</td>';
            $table .= '<td>';
            $table .= '<a href="#" class="material-symbols-outlined text-decoration-none">edit</span></a>';
            $table .= '<a href="#" class="material-symbols-outlined text-decoration-none">delete</span></a>';
            $table .= '</td>';
            $table .= '</tr>';
        }

        echo $table;
        ?>
        </tbody>
    </table>
</section>

