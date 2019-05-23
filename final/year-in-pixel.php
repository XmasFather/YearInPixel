<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Year in Pixel</title>
    <link rel="stylesheet" href="yearinpixel.css">
  </head>
  <body>
    <?php require("functions.php");?>
    <?php calendrier();?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">

      $('#calendrier .case').addClass('color_0');

      $('#calendrier .case').on('click',function(){
        var classe = $(this).attr('class');
        var temp = classe.split("_");

        classe = parseInt(temp[1], 10);

        if(classe < 6 ){
          classe++;
        }
        else{
          classe = 1;
        }

        var nouvelle_classe = "color_"+classe.toString();
        $(this).removeClass();
        $(this).addClass(nouvelle_classe);
      })
    </script>
  </body>
</html>
