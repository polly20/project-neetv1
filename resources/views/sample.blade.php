<!DOCTYPE html>
<html>
  <head>
    <title>MathJax TeX Test Page</title>
    <script type="text/javascript" async
      src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.2/MathJax.js?config=TeX-MML-AM_HTMLorMML">

      MathJax.Hub.Config({
        config: ["MMLorHTML.js"],
        jax: ["input/TeX","input/MathML","input/AsciiMath","output/HTML-CSS","output/NativeMML", "output/PreviewHTML"],
        extensions: ["tex2jax.js","mml2jax.js","asciimath2jax.js","MathMenu.js","MathZoom.js", "fast-preview.js", "AssistiveMML.js", "a11y/accessibility-menu.js"],
        TeX: {
          extensions: ["AMSmath.js","AMSsymbols.js","noErrors.js","noUndefined.js"]
        }
      });
    </script>
  </head>
  <body>
    <p>
      When $a \ne 0$, there are two solutions to \(ax^2 + bx + c = 0\) and they are
$$x = {-b \pm \sqrt{b^2-4ac} \over 2a}.$$
    </p>
  </body>
</html>
