<html>
    <head>
        <title>PHP Lightbox Testing</title>
        <style>           
            .gallery {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin: auto;
                overflow: hidden;
                justify-content: center;
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

            .desc {  
                padding: 10px;
                color: white;
            }
        </style>
    </head>
    <body>
    <?php
        // array containing file names
    function FileInfo(string $path): array {
        $pathInfo = pathinfo($path);
        $descriptionPathname = 'art/23/description/'.$pathInfo['filename'].'.html';


        if (file_exists($descriptionPathname)) {
            $description = file_get_contents($descriptionPathname);
        } else {
            $description = null;
        }

        return [
            // filename
            'slug' => $pathInfo['filename'],
            // art/23/fin/filename.jpg
            'imgSrc' => 'art/23/fin/' . $pathInfo['basename'],
            // filename.jpg
            'imgName' => $pathInfo['basename'],
            // art/23/thumbs/fin/filename.jpg
            'thumbSrc' => 'art/23/thumbs/fin/' . $pathInfo['basename'],
            // contents of filename.html
            'description' => $description,
            // art/23/description/filename.html
            'descpath' => $descriptionPathname,
        ];
    }
    ?>
    Finished work<br>
    <div class="gallery">
        <?php 
        $thumbs = glob("art/23/thumbs/fin/*.*");
                // gallery layout
        $thumbs = array_reverse($thumbs);
        $thumbsCount = count($thumbs);
        foreach ($thumbs as $i => $t) { 
            // art/23/thumbs/fin/filename.jpg
            $info = Fileinfo($t);
            // contents of filename.html
            $text = $info['description'];
            // filename
            $slug = $info['slug'];
            // filename.jpg
            $imgname = $info['imgName'];
            $imgsrc = $info['imgSrc'];
            if ($i <= $thumbsCount) {
                $next = $thumbs[$i+1] ?? '';
                $nextpath = explode("/", $next ?? '');
                $nextimg = $nextpath[4] ?? '';
                $prev = $thumbs[$i-1] ?? '';
                $prevpath = explode("/", $prev ?? '');
                $previmg = $prevpath[4] ?? '';
                
            }
        ?>
        <a href="#<?= $imgname ?>"><img src="<?= $t ?>" class="thumb" alt="<? if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
            <div class="expand" id="<?= $imgname?>">
                <a href="#_"><img src="art/23/fin/<?= $imgname?>"></a>
                <div class="nav">
                <a href="#<? echo "$previmg"; ?>">Previous</a> | <a href="#<? echo "$nextimg"; ?>">Next</a>
                </div>
                <div class="fvlink"><a href="#fvf<?= $t ?>">Full View</a></div>
                <div class="meta">
                    <div class="desc">
                        <p><i><? 
                        $seg = explode("_", $slug);
                        echo "$seg[1]/$seg[2]/20$seg[0]";
                         ?></i></p>
                        <p><? if (is_string($text) && (preg_match('#^desc: (.*)#m', $text, $match))) {
                            echo "$match[1]";} ?></p>
                        <p><? $next; ?></p>
                    </div>
                </div>
            </div>
            <div class="fullview" id="fvf<?= $t ?>">
                <a href="#<?= $imgname?>"><img src="art/23/fin/<?= $imgname?>" alt="<? if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
            </div>
        <? } ?>
    </div>
    
<br><br>
    Rough work<br>
    <div class="gallery">
        
        <?php 
        $thumbs = glob("art/23/thumbs/rough/*.*");
                // gallery layout
        $thumbs = array_reverse($thumbs);
        $thumbsCount = count($thumbs);
        foreach ($thumbs as $i => $t) { 
            // art/23/thumbs/rough/filename.jpg
            $info = Fileinfo($t);
            // contents of filename.html
            $text = $info['description'];
            // filename
            $slug = $info['slug'];
            // filename.jpg
            $imgname = $info['imgName'];
            $imgsrc = $info['imgSrc'];
            if ($i <= $thumbsCount) {
                $next = $thumbs[$i+1] ?? '';
                $nextpath = explode("/", $next ?? '');
                $nextimg = $nextpath[4] ?? '';
                $prev = $thumbs[$i-1] ?? '';
                $prevpath = explode("/", $prev ?? '');
                $previmg = $prevpath[4] ?? '';
                
            }

        ?>
        <a href="#<?= $imgname ?>"><img src="<?= $t ?>" class="thumb" alt="<? if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
            <div class="expand" id="<?= $imgname?>">
                <a href="#_"><img src="art/23/rough/<?= $imgname?>"></a>
                <div class="nav">
                <a href="#<? echo "$previmg"; ?>">Previous</a> | <a href="#<? echo "$nextimg"; ?>">Next</a>
                </div>
                <div class="fvlink"><a href="#<?= $t ?>">Full View</a></div>
                <div class="meta">
                    <div class="desc">
                        <p><i><? 
                        $seg = explode("_", $slug);
                        echo "$seg[1]/$seg[2]/20$seg[0]";
                         ?></i></p>
                        <p><? if (is_string($text) && (preg_match('#^desc: (.*)#m', $text, $match))) {
                            echo "$match[1]";} ?></p>
                        <p><? $next; ?></p>
                    </div>
                </div>
            </div>
            <div class="fullview" id="<?= $t ?>">
                <a href="#<?= $imgname?>"><img src="art/23/rough/<?= $imgname?>" alt="<? if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
            </div>
        <?php } ?>
    </div>
</body>
</html>