<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ca_ES/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
        <div class="navbar-wrapper">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">Embauma't, Viu una experiència</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Inici</a></li>
                                <li><a href="#about">Qui Som?</a></li>
                                <li><a href="http://www.embaumat.cat/contacte/">Contacte</a></li>
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Activitats <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!--<li><a href="#">xxxxx</a></li>
                                    <li><a href="#">xxx x </a></li>
                                    <li><a href="#">xxxxx</a></li>-->
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Promocions</li>
                                    <?php
                                        require_once("funcions.php");
                                        $productes = dameProducte();
                                        foreach($productes as $indice => $registro){
                                            echo '<li><a href="#">'.$registro["Nom"].'</a></li>';
                                        }
                                    ?>
                                </ul>
                                </li>
                                <li><a href="http://www.embaumat.cat/reserva/"><span class="glyphicon glyphicon-shopping-cart"></span> Fés la teva reserva</a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li><a href="http://www.embaumat.cat/administracio/administracio.php">Administrar</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>