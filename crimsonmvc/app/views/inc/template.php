<?php
function buildItem($img_source, $name_source, $price_source, $description_source)
{
    if (!@GetImageSize($img_source)) {
        $img_source = 'https://wiki.teamfortress.com/w/images/f/f4/Backpack_Sandvich.png';
    }
    $img_source_attr = htmlspecialchars($img_source, ENT_QUOTES, 'UTF-8');

    $image = '<div class="feature rounded-3 my-5 mt-n4 bg-white">
                <img src="' . $img_source_attr . '"
                     alt="Heavy\'s Sandvich">
            </div>';

    $description = '<div class="card-body bg-light">
                       <div class="container">
                           <div class="row">
                               <div class="col-md-6 text-md-left">
                                   <h2 class="text-left fs-4 fw-bold">' . $name_source . '</h2>
                               </div>
                               <div class="col-md-6 text-md-end">
                                   <h2 class="fs-4 fw-bold">$ ' . $price_source . ' </h2>
                               </div>
                           </div>
                       </div>
                       <p class="mb-0"> ' . $description_source . ' </p>
                   </div>';

    $card = '<div class="col-md-4 my-3">
                <div class="card bg-light border-0 h-55">
                    <div class="shadow p-3 card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        ' . $image . '
                        ' . $description . '
                    </div>
                </div>
            </div>';

    return $card;
}
