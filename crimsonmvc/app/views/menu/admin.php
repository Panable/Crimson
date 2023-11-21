<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php privelagedEntry() ?>

<div class="container my-5"> <!-- Added mx-auto class to center the content -->
    <!-- Repeatable Code -->
    <span class="d-flex align-items-center mb-3" id="admin-title">
            <span class="material-symbols-outlined fs-1"> restaurant_menu </span>
            <label class="ml-2 fs-3"> Admin Menu </label>
        </span>

    <div class="d-flex flex-column">
        <button type="button" class="btn btn-primary btn-sm"> Add Menu Item </button>
        <table class="table flex-grow-1">
        <thead>
            <tr class="rounded rounded-5">
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

                $img_source = URLROOT . $item->photo;

                if (!@GetImageSize($img_source)) {
                    $img_source = 'https://wiki.teamfortress.com/w/images/f/f4/Backpack_Sandvich.png';
                }

                $table .= '<tr>';
                $table .= '<td>' . $item->id . '</td>';
                $table .= '<td class="w-25 h-25"><img class="rounded rounded-5" src="' . $img_source . '"></td>';
                $table .= '<td>' . $item->name . '</td>';
                $table .= '<td>' . "$" . $item->price . '</td>';
                $table .= '<td>' . $item->description . '</td>';
                $table .= '<td>';
                $table .= '<a href="' . URLROOT . 'menu' . '/edit/' . $item->id . '" class="material-symbols-outlined text-decoration-none">edit</span></a>';
                $table .= '<a href="' . URLROOT . 'menu' . '/delete/' . $item->id . '" class="material-symbols-outlined text-decoration-none">delete</span></a>';
                $table .= '</td>';
                $table .= '</tr>';
            }


            echo $table;
            ?>
        </tbody>
    </table>
    <!-- Switching Pages Finished! perhaps make a border round it
         Use if there are more items in the database.
    -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-start">
            <li class="page-item">
                <a class="rounded-start" href="#">
                    <span class="page-link material-symbols-outlined"> arrow_back </span>
                </a>
            </li>
            <li class="page-item rounded"><a class="page-link" href="#">1</a></li>
            <li class="page-item rounded"><a class="page-link" href="#">2</a></li>
            <li class="page-item rounded"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="rounded-end" href="#">
                    <span class="page-link material-symbols-outlined"> arrow_forward </span>
                </a>
            </li>
        </ul>
    </nav>
</div>
