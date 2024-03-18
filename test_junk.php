<?php
    $thumbs = glob("art/thumbs/fin/*.*");
    // gallery layout
    $thumbs = array_reverse($thumbs);
?>
<html>
<head>
    <title>PHP Lightbox Testing</title>
    <style>
        #gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin: 0 auto;
            overflow: hidden;
        }

        #gallery img {
            padding: 10px;
            border: 1px solid #ddd;
            background: #fff;
            object-fit: cover;
        }

        .thumb {
            height: 205px;
            max-width: 205px;
        }

        .fullview {
            /* Default to hidden */
            display: none;
            /* Overlay entire screen */
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* A bit of padding around image */
            padding: 1em;
            /* Translucent background */
            background: rgba(255, 255, 255, .8);
        }

        /* Unhide the lightbox when it's the target */
        .fullview:target {
            display: block;
        }

        .fullview img {
            /* Full width and height */
            max-height: 600px !important;
            max-width: 100% !important;
            display: block;
            margin: auto;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div id="gallery">
    <?php foreach ($thumbs as $idx => $t) { ?>
    <a href="#fv<?= $idx ?>"><img src="<?= $t ?>" class="thumb"></a>
    <a href="#" class="fullview" id="fv<?= $idx ?>"><img src="art/fin/<?= rawurlencode(basename($t)) ?>"></a>
    <?php } ?>
</div>
</body>
</html>