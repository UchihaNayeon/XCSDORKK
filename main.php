<?php
require_once __DIR__ . "/vendor/autoload.php";

$Color = new \Colors\Color();
$XCSDork = new \XCSDorker\Main;
$XCSDork->cls();

$XCS = '

      
        ██╗░░██╗░█████╗░░██████╗
        ╚██╗██╔╝██╔══██╗██╔════╝
        ░╚███╔╝░██║░░╚═╝╚█████╗░
        ░██╔██╗░██║░░██╗░╚═══██╗
        ██╔╝╚██╗╚█████╔╝██████╔╝
        ╚═╝░░╚═╝░╚════╝░╚═════╝░';
echo str_replace('$', "\e[1;36m$\e[0m", $ITACHI) . PHP_EOL;

echo $Color("XcsDorker")->bg_light_red()->white()->italic()->center() . PHP_EOL;
echo $Color("ITACHI")->bg_light_red()->white()->italic()->center() . PHP_EOL . PHP_EOL;


echo "   " . $Color("[^] Input Dork        : ")->bg_black()->bold()->green();
$Dork = trim(fgets(STDIN, 1024));
echo "   " . $Color("[^] Save Result [y/n] : ")->bg_black()->bold()->green();
$Save = trim(fgets(STDIN, 1024));

if (strtolower($Save) == "y") {
    echo "   " . $Color("[^] Save as           : ")->bg_black()->bold()->green();
    $SaveAs = trim(fgets(STDIN, 1024));
}

$start = 0;
$queue = 1;
$tempFile = hash("sha256", rand(000, 999)) . ".txt";

$ZDork->setDork( $Dork );

echo PHP_EOL;

while(1){
    if ($XcsDork->search($start)) {
        $start = $start+10;
        foreach ($XcsDork->parseOutput() as $key => $value) {

            /*
            echo "       " . $Color("URL     : " . $value["url"])->bg_black()->bold()->green() . PHP_EOL;
            echo "       " . $Color("TITLE   : " . $value["title"])->bg_black()->bold()->green() . PHP_EOL;
            echo "       " . $Color("CONTENT : ")->bg_black()->bold()->green() . $value["content"] . PHP_EOL;
            */

            echo "     [" . $queue++ . "] " . $Color($value["url"])->bg_black()->bold()->green().PHP_EOL;
            if (isset($SaveAs)) {
                if (empty($SaveAs)) {
                    $XcsDork->write( $tempFile, $value["url"].PHP_EOL );
                } else {
                    $XcsDork->write( $SaveAs, $value["url"].PHP_EOL );
                }
            }
        }
    } else {
        break;
    }
}

if ($start === 0) {
    $ZDork->cls();
    echo "
    xcs - {$Dork} - pogi ni itachi.

    Saran:
    
    itachi lang pogi.
    sharingannnnnnnnnnnnnnnnn.
    xcsxuchiha itachi." . PHP_EOL;
}