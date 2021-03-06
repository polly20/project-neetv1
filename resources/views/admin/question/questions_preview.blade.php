<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>

    <script type="text/javascript" async
            src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS_CHTML">
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        body {
            color: rgba(255, 255, 255, 0.85);
            /*color: #000;*/
            font-family: "Nunito", sans-serif;
            font-size: 12px;
        }
        .MJXc-display {
            display: flex !important;
        }
    </style>
</head>
<body>

<?php
if (isset($_COOKIE[$preview_name])){
    echo $_COOKIE[$preview_name];
}
?>

</body>
</html>
