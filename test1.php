<html>
    <head>
        <title>PHP Lightbox Testing</title>
        <style>           
            .gallery {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin: 0 auto;
                overflow: hidden;
            }

            .gallery img {
                padding: 10px;
                border: 1px solid #ddd;
                background: #fff;
                object-fit: cover;
            }

            .thumb {
                height: 205;
                max-width: 205;
            }

            .expand {
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
            .expand:target {
                display: block;
            }

            .expand img {
            /* Full width and height */
                max-height: 600px !important;
                max-width: 100% !important;
                display: block;
                margin: auto;
                margin-top: 50;
            }
            .nav {
                text-align: center;
                margin: auto;
            }

            .fvlink {
                text-align: center;
                margin: auto;
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
            /* Translucent background */
                background: rgba(255, 255, 255, .8);
                overflow-y: auto;
            }

            /* Unhide the lightbox when it's the target */
            .fullview:target {
                display: block;
            }

            .fullview img {
            /* Full width and height */
                display: block;
                margin: auto;
            }

            .meta { 
                text-align: center;
                margin: auto;
                margin-top: 20px;
                width: 500px;  
                background-color: black;
                border-radius: 10px; 
            }

            .desc, .tags {  
                padding: 20px;
                color: white;
            }
        </style>
    </head>
    <body>
    Finished work<br>
    <div class="gallery">
        <?php
        $thumbs = glob("art/thumbs/fin/*.*");
        $countex = 0;
        $countfv = 0;
        $prev = $countex - 1;
        $next = $countex + 1;
        // gallery layout
        $thumbs = array_reverse($thumbs);
        foreach ($thumbs as $t) {
            $countex++;
            $countfv++;
            $prev++;
            $next++;
            printf("<a href='#exf%d'><img src='%s' class='thumb'></a>
            <div class='expand' id='exf%d'>
                <a href='#_' ><img src='art/fin/%s'></a>
                <div class='nav'><a href='#exf%d'>Previous</a> | <a href='#exf%d'>Next</a></div>
                <div class='fvlink'><a href='#fvf%d'>Full View</a></div>
                <div class='meta'>
                    <div class='desc'>Image description goes here</div>
                    <div class='tags'>#pretend #these #are #tags</div>
                </div>
            </div>
            <div class='fullview' id='fvf%d'><a href='#exf%d'><img src='art/fin/%s'></a></div>", 
            $countex, $t, $countex, rawurlencode(basename($t)), $prev, $next, $countfv, $countfv, $countex, rawurlencode(basename($t)));
        }
        ?>
    </div>
    <br><br>
    Rough work
    <br><br>
    <div class="gallery">
        <?php
        $thumbs = glob("art/thumbs/rough/*.*");
        $countex = 0;
        $countfv = 0;
        $prev = $countex - 1;
        $next = $countex + 1;
        // gallery layout
        $thumbs = array_reverse($thumbs);
        foreach ($thumbs as $t) {
            $countex++;
            $countfv++;
            $prev++;
            $next++;
            printf("<a href='#exr%d'><img src='%s' class='thumb'></a>
            <div class='expand' id='exr%d'>
                <a href='#_' ><img src='art/rough/%s'></a>
                <div class='nav'><a href='#exr%d'>Previous</a> | <a href='#exr%d'>Next</a></div>
                <div class='fvlink'><a href='#fvr%d'>Full View</a></div>>
                <div class='meta'>
                    <div class='desc'>Image description goes here</div>
                    <div class='tags'>#pretend #these #are #tags</div>
                </div>
            </div>
            <div class='fullview' id='fvr%d'><a href='#exr%d'><img src='art/rough/%s'></a></div>", 
            $countex, $t, $countex, rawurlencode(basename($t)), $prev, $next, $countfv, $countfv, $countex, rawurlencode(basename($t)));
        }
        ?>
    </div>
</body>
</html>