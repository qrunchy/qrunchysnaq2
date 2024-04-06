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
                height: 205;
                max-width: 205;
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
                margin-top: 50;
            }

            .meta {
                background-color: black;
                text-align: center;
                color: white;
                margin: auto;
                margin-top: 20px;
                width: 500px;
                border-radius: 10px;               
            }
        </style>
    </head>
    <body>
    <div id="gallery">
        <?php
        $thumbs = glob("art/thumbs/*.*");
        $count = 0;
        // gallery layout
        $thumbs = array_reverse($thumbs);
        foreach ($thumbs as $t) {
            $count++;
            printf("<a href='#fv%d'><img src='%s' class='thumb'></a>
               <a href='#_' class='fullview' id='fv%d'><img src='art/%s'></a>", $count, $t, $count, rawurlencode(basename($t)));
        }
        ?>
    </div>
</body>
</html