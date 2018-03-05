<!DOCTYPE html>
<html>
  <head>
    <title>Angular 2 Hello Mathjax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
    </script>

    <script type="text/javascript" async
      src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <style>
      body { color: #fff; }
    </style>
  </head>
  <body>
    <!-- <br /> -->

    {{ $array["answer"] }}

    <!-- <br /> -->
  </body>
</html>
