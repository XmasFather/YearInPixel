<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Year in Pixel | Quentin Marolleau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="yearinpixel.css">
  </head>
  <body>
    <?php require("functions.php");?>

    <header>
      <p>Ceci est le header</p>
    </header>

    <span class="cache">    </span>

    <nav class="popup">
      <h2>Choisissez votre humeur</h2>
      <span>
        <div class="small_square color_1"></div>
        <div class="small_square color_2"></div>
        <div class="small_square color_3"></div>
        <div class="small_square color_4"></div>
      </span>
    </nav>

    <section id="zone-calendrier">
      <?php calendrier();?>
    </section>

    <section id="infos-couleurs">
      <?php infoCouleurs();?>
    </section>

    <footer>
      <p>Proudly designed by Myrial Bavinckhove &amp; Quentin Marolleau in California</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">

      $('#calendrier .case').addClass('color_0');

      $('#calendrier .case').on('click',function(){

        var cettecase = $(this);

        $('.cache').show();
        $('.popup').show();

        var classe = $(this).attr('class');
        var temp = classe.split("_");

        classe = parseInt(temp[1], 10);
        /*
        if(classe < 6 ){
          classe++;
        }
        else{
          classe = 1;
        }

        var nouvelle_classe = "color_"+classe.toString();
        */
        $(this).removeClass();
        $(this).addClass('case');
        $(this).addClass(nouvelle_classe);

        $('.popup span div').on('click',function(){
          $('.cache').hide();
          $('.popup').hide();
        })
        $('.popup span div:nth-child(1)').on('click',function(){
          $(cettecase).removeClass();
          $(cettecase).addClass("case color_1");
        })
        $('.popup span div:nth-child(2)').on('click',function(){
          $(cettecase).addClass("case color_2");
        })
        $('.popup span div:nth-child(3)').on('click',function(){
          $(cettecase).addClass("case color_3");
        })
        $('.popup span div:nth-child(4)').on('click',function(){
          $(cettecase).addClass("case color_4");
        })

      })

      $('.cache').on('click',function(){
        $('.cache').hide();
        $('.popup').hide();
      })

    </script>
  </body>
</html>
