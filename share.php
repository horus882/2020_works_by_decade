<?

$site_title = 'HUANG YI KAI．Work of a Decade';
$site_description = 'Portfolio of HUANG YI KAI at M’ORANGE, 2010-2020';
$filename = 'site';

if (isset($_GET['id'])) {

    // $filename = $_GET['id'];

    if ($_GET['id'] == '1') {
        $site_title = 'Work of a Decade : Kiânn Official Site';
        $site_description = 'Client : Starlux Airlines / Website Design';
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
            location.href = 'https://www.huangyikai.com/work10/work/<? echo($_GET['id']) ?>';
        }, 250);
    </script>
</head>
<body>
</body>
</html>
