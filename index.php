

<!DOCTYPE html>
<html>
    <head>
        <!-- Responsive design -->
        <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1">
        <meta charset="utf-8">
        <title>Feed</title>
        
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/layout.css">
            <link href="css/nav.css" rel="stylesheet">
        <script type="text/javascript" src="js/query.js"></script>
        <script type="text/javascript" src="js/nav.js"></script>
        <script type="text/javascript"  charset="utf-8" src="js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Nav bar jquery will move in future. --> 
        <script>
            $(function() {
                var pull        = $('#pull');
                    menu        = $('nav ul');
                    menuHeight  = menu.height();
             
                $(pull).on('click', function(e) {
                    e.preventDefault();
                    menu.slideToggle();
                });
            });
            
            $(window).resize(function(){
                var w = $(window).width();
                if(w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        </script>
    </head>
    <body>
       <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="#">Home</a></li>
            <li><a href="index.php">Feed</a></li>
            <li><a href="#">Profile</a></li>
         <!--   <li><a href="#">Design</a></li>
            <li><a href="#">Web 2.0</a></li>
            <li><a href="#">Tools</a></li>  -->
            <a style="float: right" href='logout.php'>log out</a>
            
             <!-- Nav bar Image styled as button --> 
            <button type="button"  class="btn btn-circle btn-xl">image</button>
        </ul>
            <a href="#" id="pull">Menu</a>
       </nav>
       
       
        <!-- Center the page in the middle and contain the layout
        to a specific width -->
        <div class="container"> <!-- start wrapper -->

        <div class="page-data">
            
        </div>
        <h3 class="comment-title">News Feed</h3>
        
        <div class="comments-list">
            
            <ul class="comments-holder-ul">
                <li class="comment-holder" id="_1">
                    <div class="user-img">
                        <img src="img/placeholder.jpeg"
                        class="user-img-pic img-responsive"
                        alt="Placeholder for image" />
                    </div>
                    
                    <div class="comment-body">
                        <h3 class="username-field">
                        Jim
                        </h3>
                        <div class="comment-text">
                            Proin pellentesque a sem sed feugiat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse eget.
                        </div>
                    </div>
                </li>
                <li class="comment-holder" id="_2">
                    <div class="user-img">
                        <img src="img/placeholder.jpeg"
                        class="user-img-pic img-responsive"
                        alt="Placeholder for image" />
                    </div>
                    
                    <div class="comment-body">
                        <h3 class="username-field">
                        Mike
                        </h3>
                        <div class="comment-text">
                           Ut sollicitudin, nisi quis ullamcorper aliquet, tortor justo rhoncus dui, eu facilisis urna ante id augue.
                        </div>
                    </div>
                </li>
                <li class="comment-holder" id="_3">
                    <div class="user-img">
                        <img src="img/placeholder.jpeg"
                        class="user-img-pic img-responsive"
                        alt="Placeholder for image" />
                    </div>
                    
                    <div class="comment-body">
                        <h3 class="username-field">
                        Aman
                        </h3>
                        <div class="comment-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae molestie felis.  
                        </div>
                    </div>
                </li>
                <li class="comment-holder" id="_4">
                    <div class="user-img">
                        <img src="img/placeholder.jpeg"
                        class="user-img-pic img-responsive"
                        alt="Placeholder for image" />
                    </div>
                    
                    <div class="comment-body">
                        <h3 class="username-field">
                        Nick
                        </h3>
                        <div class="comment-text">
                            Vestibulum vehicula feugiat mauris
                        </div>
                    </div>
                </li> 
            </ul>
        </div>
    </div>
    </div> <!-- end wrapper -->
</body>
</html>