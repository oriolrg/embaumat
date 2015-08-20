        <!DOCTYPE HTML>
        <html lang="ca">
        <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8" >
        <meta name="copyright" content="Oriol Riu Gispert" >
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" >
        <meta name="description" content="Embauma't, una gran aventura per redescobrir els origens. El retorn a les entranyes de la mare terra a la Vall de Lord" >
        <meta name="keywords" content="Vall de Lord, la coma, la pedra, Sant llorenç de morunys, guixers, vall de lord, bauma, embauma't, peroctar" >
        <meta name="google-translate-customization" content="784bdf1995a0234e-47114fb6b988d9b2-g75e2b5bccb9f10cd-10" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- All in one Favicon 4.3 -->
        <link rel="icon" href="http://www.embaumat.cat/favicon.ico"  type="image/x-icon"  />
        <link rel="shortcut icon" href="http://www.embaumat.cat/favicon.ico" type="image/x-icon" />
        <!-- Bootstrap core CSS -->
        <link href="/jmvc/jmvc/app/views/default/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/jmvc/jmvc/app/views/default/css/calendario.css">
        <link rel='stylesheet' type="text/css" href='/jmvc/jmvc/app/views/default/css/estil.css'/>

        <!-- Custom styles for this template 
        <link href="http://www.embaumat.cat/jumbotron.css" rel="stylesheet">-->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="/jmvc/jmvc/app/views/default/css/carousel.css" rel="stylesheet">
        
            <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        
        <script type="text/javascript"  src="/js/jquery.js"></script>
        <script type="text/javascript"  src="/js/jquery.ui.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/funcions.js"></script>
        <script type="text/javascript" src="/js/calendario.js"></script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-47536376-1', 'embaumat.cat');
        ga('send', 'pageview');

        </script>
        <script src="/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
        <script>
        var device = navigator.userAgent
        if (!device.match(/Iphone/i)|| !device.match(/Ipod/i)|| !device.match(/Android/i)|| !device.match(/J2ME/i)|| !device.match(/BlackBerry/i)|| !device.match(/iPhone|iPad|iPod/i)|| !device.match(/Opera Mini/i)|| !device.match(/IEMobile/i)|| !device.match(/Mobile/i)|| !device.match(/Windows Phone/i)|| !device.match(/windows mobile/i)|| !device.match(/windows ce/i)|| device.match(/webOS/i)|| !device.match(/palm/i)|| !device.match(/bada/i)|| !device.match(/series60/i)|| !device.match(/nokia/i)|| !device.match(/symbian/i)|| !device.match(/HTC/i))
         { 

                $(document).ready(function() {
                    $('.navbar-wrapper').scrollToFixed();
                    var summaries = $('#container-tabs');
                summaries.each(function(i) {
                    var summary = $(summaries[i]);
                    var next = summaries[i + 1];

                    summary.scrollToFixed({
                        marginTop: $('.navbar-wrapper').outerHeight(true) + 25,
                        limit: function() {
                            var limit = 0;
                            if (next) {
                                limit = $(next).offset().top - $(this).outerHeight(true) - 15;
                            }
                            return limit;
                        },
                        zIndex: 999
                    });
                });
                });

        }
        </script>
        <title>#TITLE#</title>
</head>
<body>

<div id="wrapper">
		<!-- header  -->
        <div id="header">	 
		   #HEADER#
		</div>
		<!-- end: header  -->		
		<!-- columna izquierda  -->
        <div id="leftcolumn">		 
		  #MENU#
		</div>
		<!-- end: columna izquierda  -->		 
		<!-- contenido -->
		<div id="contingut-tab">		
		  #CONTENIDO#		 
		</div>
		<!-- end: contenido -->		 
</div>
</body>
</html>
