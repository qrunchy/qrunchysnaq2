<!DOCTYPE html>
<?php
        // array containing file names
    function FileInfo(string $path): array {
        $pathInfo = pathinfo($path);
        $descriptionPathname = 'art/19/description/'.$pathInfo['filename'].'.html';


        if (file_exists($descriptionPathname)) {
            $description = file_get_contents($descriptionPathname);
        } else {
            $description = null;
        }

        return [
            // filename
            'slug' => $pathInfo['filename'],
            // art/19/fin/filename.jpg
            'imgSrc' => 'art/19/fin/' . $pathInfo['basename'],
            // filename.jpg
            'imgName' => $pathInfo['basename'],
            // art/19/fin/thumbsfilename.jpg
            'thumbSrc' => 'art/19/fin/thumbs/' . $pathInfo['basename'],
            // contents of filename.html
            'description' => $description,
            // art/19/description/filename.html
            'descpath' => $descriptionPathname,
        ];
    }
    ?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2019</title>
    <link rel="icon" type="image/x-icon" href="img/cdfavicon.ico">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="load.js"></script>
<script type="text/javascript" src="cursor.js"></script>
    </head>

  <body>
    <div id="box">
        <header></header> 
        <nav></nav> 
        <main>
          <div id="container">   
          <div id="pagecontent" tabindex="0">
            <div id="top"></div>
            <p><a href="art.php">Art</a> | <a href="archive.html">Archive</a><br>
            <div id="archnav"></div>
              <a href="#fin">Finished work</a> | <a href="#rough">Rough work</a>
              <h1><img src="img/2019.png" class="subtitle1" alt="2019"></h1>
              I didn't get to draw much in 2019 as that was the year I started my first full time job in years and had finally moved out of my grandmother's house. I didn't have a lot of time or energy to draw as a result. This year is honestly a blur to me so I don't really remember much about where I was creatively. I know I played like, a shit load of guild wars 2 so once again that was a huge chunk of what I drew.
                <h2><img src="img/finishedwork.png" class="subtitle" id="fin" alt="Finished Work"></h2>
                <div class="gallery">

                <?php 
                $thumbs = glob("art/19/fin/thumbs/*.*");
                // gallery layout
                $thumbsCount = count($thumbs);
                foreach ($thumbs as $i => $t) { 
                // art/19/fin/thumbsfilename.jpg
                $info = Fileinfo($t);
                // contents of filename.html
                $text = $info['description'];
                // filename
                $slug = $info['slug'];
                // filename.jpg
                $imgname = $info['imgName'];
                // art/19/fin/filename.jpg
                $imgsrc = $info['imgSrc'];
                // pull alt text from filename.html
                $alt = is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match));
                //pull description from filename.html
                $desc = is_string($text) && (preg_match('#^desc: (.*)#m', $text, $match));
                // navigation
                if ($i <= $thumbsCount) {
                    $next = $thumbs[$i+1] ?? '';
                    $nextpath = explode("/", $next ?? '');
                    $nextimg = $nextpath[4] ?? '';
                    $prev = $thumbs[$i-1] ?? '';
                    $prevpath = explode("/", $prev ?? '');
                    $previmg = $prevpath[4] ?? '';}
                ?>

                <a href="#<?= $imgname ?>"><img src="<?= $t ?>" class="galthumb" alt="<?php if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
                <div class="expand" id="<?= $imgname?>">
                    <a href="#_"><img src="<?= $imgsrc?>"></a>
                    <div class="meta">
                        <div class="desc">
                            <a href="#<?= "$previmg"; ?>">Previous</a> | <a href="#<?= "$nextimg"; ?>">Next</a><br>
                            <a href="#fvf<?= $t ?>">Full View</a>
                            <p><i><?php $seg = explode("_", $slug);
                            echo "$seg[0]/$seg[1]/2019";?></i><br>
                            <?php if ( is_string($text) && (preg_match('#^desc: (.*)#m', $text, $match))) {
                            echo "$match[1]";} ?></p>
                        </div>
                    </div>
                </div>
                <div class="fullview" id="fvf<?= $t ?>">
                    <a href="#<?= $imgname?>"><img src="art/19/fin/<?= $imgname?>" alt="<?php if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
                </div>
                <?php } ?>
            </div>
            <a href="#top">Back to top</a><br><br>

            <h2><img src="img/roughwork.png" class="subtitle" id="rough" alt="Rough Work"></h2>
            <div class="gallery">

                <?php 
                $thumbs = glob("art/19/rough/thumbs/*.*");
                // gallery layout
                $thumbsCount = count($thumbs);
                foreach ($thumbs as $i => $t) { 
                // art/19/rough/thumbs/filename.jpg
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
                    $previmg = $prevpath[4] ?? '';}
                ?>

                <a href="#<?= $imgname ?>"><img src="<?= $t ?>" class="galthumb" alt="<?php if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
                <div class="expand" id="<?= $imgname?>">
                    <a href="#_"><img src="art/19/rough/<?= $imgname?>"></a>
                    <div class="meta">
                        <div class="desc">
                            <a href="#<?= "$previmg"; ?>">Previous</a> | <a href="#<?= "$nextimg"; ?>">Next</a><br>
                            <a href="#fvr<?= $t ?>">Full View</a>
                            <p><i><?php $seg = explode("_", $slug);
                            echo "$seg[0]/$seg[1]/2019";?></i><br>
                            <?php if ( is_string($text) && (preg_match('#^desc: (.*)#m', $text, $match))) {
                            echo "$match[1]";} ?></p>
                        </div>
                    </div>
                </div>
                <div class="fullview" id="fvr<?= $t ?>">
                    <a href="#<?= $imgname?>"><img src="art/19/rough/<?= $imgname?>" alt="<?php if (is_string($text) && (preg_match('#^alt: (.*)#m', $text, $match))) {echo "$match[1]";}?>"></a>
                </div>
                <?php } ?>
            </div>
            <a href="#top">Back to top</a><br>
          </div>
            </div>
            <footer></footer>
        </main>
   </div>
  </body>
  