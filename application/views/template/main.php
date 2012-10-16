<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bokul
 * Date: 10/16/12
 * Time: 10:20 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html>
<html>

<!-- #BeginTemplate "default.dwt" -->

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <!-- #BeginEditable "doctitle" -->
    <title>SMS HUB | <?php echo $title; ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/js/login.js"; ?>"></script>
    <!-- #EndEditable -->
    <link href="<?php echo base_url()."assets/default.css"; ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<?php echo $header; ?>

<div class="content">

    <?php echo $content; ?>

</div><!-- home content div ends -->

<!-- #EndEditable -->

<?php echo $footer; ?>


<!-- WRAPPER ENDS -->

</body>

<!-- #EndTemplate -->

</html>