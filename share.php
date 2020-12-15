<?

$filename = 'site';

if (isset($_GET['id'])) {

    $filename = $_GET['id'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <meta name="keywords" content="">
    <meta name="description" content="Portfolio of HUANG YI KAI at M’ORANGE, 2010-2020">

    <meta property="og:image" content="https://www.huangyikai.com/work10/meta/<? echo($filename) ?>.jpg">
    <meta property="og:image:url" content="https://www.huangyikai.com/work10/meta/<? echo($filename) ?>.jpg">
    <meta property="og:title" content="HUANG YI KAI．Work of a Decade">
    <meta property="og:description" content="Portfolio of HUANG YI KAI at M’ORANGE, 2010-2020">
    <meta property="og:type" content="website">

    <title>HUANG YI KAI．Work of a Decade</title>
</head>
<body>
</body>
</html>
