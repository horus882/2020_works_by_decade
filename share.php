<?

$site_title = 'HUANG YI KAI．Work of a Decade';
$site_description = 'Portfolio of HUANG YI KAI at M’ORANGE, 2010-2020';

$page = null;
$filename = 'site';

if (isset($_GET['id'])) {

    if (is_numeric($_GET['id'])) {
        $page = $_GET['id'];
        $filename = $_GET['id'];
    }

    switch($_GET['id']) {
        case '1':
            $site_title = 'Work of a Decade : Kiânn Official Site';
            $site_description = 'Client : Starlux Airlines．2020．Official Site';
            break;
        case '2':
            $site_title = 'Work of a Decade : Let’s Kiânn';
            $site_description = 'Client : Starlux Airlines．2020．Concept / Art & Graphic / Storyboard / Motionboard';
            break;
        case '3':
            $site_title = 'Work of a Decade : Tefal New Gourmet Wave Key Visual';
            $site_description = 'Client : Tefal Taiwan．2019．Key Visual / Typography';
            break;
        case '4':
            $site_title = 'Work of a Decade : Yuan Launch Campaign';
            $site_description = 'Client : Yuan．2019．Website Design';
            break;
        case '5':
            $site_title = 'Work of a Decade : M’ORANGE Annual Briefing Key Visual';
            $site_description = 'M’ORANGE Internal Project．2019．Graphic Design';
            break;
        case '6':
            $site_title = 'Work of a Decade : M’ORANGE Christmas Greeting Card';
            $site_description = 'M’ORANGE Internal Project．2019．Graphic / Photography / Handwriting';
            break;
        case '7':
            $site_title = 'Work of a Decade : Kirin Hyoketsu Landing Page';
            $site_description = 'Client : Kirin Taiwan．2018．Website Design';
            break;
        case '8':
            $site_title = 'Work of a Decade : Kirin Travel Hyoketsu Campaign';
            $site_description = 'Client : Kirin Taiwan．2018．Website / Graphic / Typography / Handwriting';
            break;
        case '9':
            $site_title = 'Work of a Decade : Kirin Gogotea Photography';
            $site_description = 'Client : Kirin Taiwan．2018．Photography / Handwriting';
            break;
        case '10':
            $site_title = 'Work of a Decade : New Balance Campus Relay Campaign';
            $site_description = 'Client : New Balance Taiwan．2018．Key Visual Mockup / Typography / Package';
            break;
        case '11':
            $site_title = 'Work of a Decade : New Balance Campus Relay Campaign';
            $site_description = 'Client : New Balance Taiwan．2017．Website / Typography';
            break;
        case '12':
            $site_title = 'Work of a Decade : New Balance Official Site';
            $site_description = 'Client : New Balance Taiwan．2017．Official Site Design';
            break;
        case '13':
            $site_title = 'Work of a Decade : New Balance 247 Campaign';
            $site_description = 'Client : New Balance Taiwan．2017．Website / Handwriting / Typography / OOH / Element / Event Materials / Printed Materials';
            break;
        case '14':
            $site_title = 'Work of a Decade : MUJI Skin Care Campaign';
            $site_description = 'Client : MUJI Taiwan．2017．Website / Illustration';
            break;
        case '15':
            $site_title = 'Work of a Decade : Macro Maison Official Site';
            $site_description = 'Client : Macro Maison．2016．Official Site / Backdrop & Scene Design';
            break;
        case '16':
            $site_title = 'Work of a Decade : Kirin Gogotea ”30 Days of Little Luxury” Campaign';
            $site_description = 'Client : Kirin Taiwan．2016．Graphic / Photography / Exhibition';
            break;
        case '17':
            $site_title = 'Work of a Decade : Kirin Gogotea Autumn Special Recipe Video';
            $site_description = 'Client : Kirin Taiwan．2016．Typography';
            break;
        case '18':
            $site_title = 'Work of a Decade : Kirin Gogotea Lucky Draw Campaign';
            $site_description = 'Client : Kirin Taiwan．2016．Website Design';
            break;
        case '19':
            $site_title = 'Work of a Decade : Audi A4 Launch Campaign';
            $site_description = 'Client : Audi Taiwan．2016．Website / Printed Materials';
            break;
        case '20':
            $site_title = 'Work of a Decade : Audi Features of the A6 & S8';
            $site_description = 'Client : Audi Taiwan．2016．Social Post Layout';
            break;
        case '21':
            $site_title = 'Work of a Decade : Adidas Women Training Campaign';
            $site_description = 'Client : Adidas Taiwan．2015．Website / Typography / Element';
            break;
        case '22':
            $site_title = 'Work of a Decade : Audi A3 Launch Campaign';
            $site_description = 'Client : Audi Taiwan．2013．Website Design';
            break;
        case '23':
            $site_title = 'Work of a Decade : M’ORANGE Christmas Greeting Project';
            $site_description = 'M’ORANGE Internal Project．2013．Graphic / Chalk Drawing';
            break;
        case '24':
            $site_title = 'Work of a Decade : Nike Free Illustration';
            $site_description = 'Client : Nike Taiwan．2011．Illustration';
            break;
        case '25':
            $site_title = 'Work of a Decade : M’ORANGE Internal Workshop';
            $site_description = 'M’ORANGE Internal Workshop．2010．Graphic / Photography / Typography';
            break;
        case '26':
            $site_title = 'Work of a Decade : Kirin Ichi-Ban Beer Social Media Post';
            $site_description = 'Client : Kirin Taiwan．2020．Graphic / Calligraphy / Handwriting';
            break;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <meta name="keywords" content="">
    <meta name="description" content="<? echo($site_description) ?>">

    <meta property="og:image" content="https://www.huangyikai.com/work10/meta/<? echo($filename) ?>.jpg">
    <meta property="og:image:url" content="https://www.huangyikai.com/work10/meta/<? echo($filename) ?>.jpg">
    <meta property="og:title" content="<? echo($site_title) ?>">
    <meta property="og:description" content="<? echo($site_description) ?>">
    <meta property="og:type" content="website">

    <title><? echo($site_title) ?></title>
    <script>
        setTimeout(function() {
            location.href = 'https://www.huangyikai.com/work10/work/<? echo($page) ?>';
        }, 250);
    </script>
</head>
<body>
</body>
</html>
