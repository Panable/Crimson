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
</section>
