<?php
class MasterView {
	public static function showHeader() {
        echo '<!DOCTYPE html lang="en"><html><head>';
        echo '<meta charset="utf-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';
        
        $styles = (array_key_exists('styles', $_SESSION))? $_SESSION['styles']: array();
        $base = (array_key_exists('base', $_SESSION))? $_SESSION['base']: "";
        foreach ($styles as $style ) 
           echo '<link href="/'.$base.'/css/'.$style. '" rel="stylesheet">';
        $title = (array_key_exists('headertitle', $_SESSION))? $_SESSION['headertitle']: "";
        echo "<title>$title</title>";
        echo "</head><body>";
    }
    
    public static function showUsernavbar() {
    	$base = (array_key_exists ( 'base', $_SESSION )) ? $_SESSION ['base'] : "";
    	$authenticatedUser = (array_key_exists ( 'authenticatedUser', $_SESSION )) ? $_SESSION ['authenticatedUser'] : null;
    	$user = (array_key_exists ( 'user', $_SESSION )) ? $_SESSION ['user'] : null;
    	?>
    					
    				<!-- top navbar -->
    				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle" data-toggle="offcanvas"
    							data-target=".sidebar-nav">
    							<span class="icon-bar"></span> <span class="icon-bar"></span> <span
    								class="icon-bar"></span>
    						</button>
    						<a class="navbar-brand" href="<?php echo "/" .$base. "/home"?>">PerfectPC</a>
    					</div>
    				
    				<form class="navbar-form navbar-right" action ="user" method = "Post">
    		            <a class="btn btn-primary" href="<?php echo "/" .$base. "/user/logout"?>" role="button">Log Out</a></p>
    		          </form>
    		          </nav>
    			
    			<?php
    				}
    
public static function showHeader2() {

$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']:"";
		echo '<!DOCTYPE html>';
		echo '<html lang="en">';
		
		echo '<head>';
		
		echo '<meta charset="utf-8">';
		echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo '<meta name="description" content="">';
		echo '<meta name="author" content="">';
		
		echo '<title>Cabinitron</title>';
		
		echo '<!-- Bootstrap Core CSS -->';
		echo '<link href="/'.$base.'/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
		
		echo '<!-- Custom CSS -->';
		echo '<link href="/'.$base.'/bootstrap/css/shop-homepage.css" rel="stylesheet">';
		
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';
		echo '<script src="/'.$base.'/bootstrap/js/bootstrap.min.js"></script>';
		
		echo '</head><body>';
}
    
    public static function showHomenavbar() {
    	$base = (array_key_exists ( 'base', $_SESSION )) ? $_SESSION ['base'] : "";
    	$authenticatedUser = (array_key_exists ( 'authenticatedUser', $_SESSION )) ? $_SESSION ['authenticatedUser'] : null;
    	$user = (array_key_exists ( 'user', $_SESSION )) ? $_SESSION ['user'] : null;
    	?>
    			
    		<!-- top navbar -->
    		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="offcanvas"
    					data-target=".sidebar-nav">
    					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
    						class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="<?php echo "/" .$base. "/home"?>">PerfectPC</a>
    			</div>
    		
    		<form class="navbar-form navbar-right" action ="login" method = "Post">
                <div class="form-group">
                  <input type="text" name ="userName" placeholder="User name" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" name = "password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <a class="btn btn-primary" href="<?php echo "/" .$base. "/registration"?>" role="button">Register</a></p>
              </form>
              </nav>
    	
    	<?php
    		}
    
    public static function showNavBar() {
    	// Show the navbar
    	$base = (array_key_exists('base', $_SESSION))? $_SESSION['base']: "";
    	$authenticatedUser = (array_key_exists('authenticatedUser', $_SESSION))? 
    	                 $_SESSION['authenticatedUser']:null;
    	$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']:null;
    	echo '<nav class="navbar navbar-inverse navbar-fixed-top">';
    	echo '<div class="container-fluid">';
    	echo '<div class="navbar-header">';
    	echo '<button type="button" class="navbar-toggle collapsed"';
    	echo 'data-toggle="collapse" data-target="#navbar"';
    	echo 'aria-expanded="false" aria-controls="navbar">';
    	echo '<span class="icon-bar"></span>';
    	echo '<span class="icon-bar"></span>';
    	echo '<span class="icon-bar"></span>';
    	echo '</button>';
    	echo '<a class="navbar-brand" href="/'.$base.'/">PerfectPC</a>';
    	echo '</div>';
    	echo '<div id="navbar" class="navbar-collapse collapse">';
    	echo '<ul class="nav navbar-nav">';
    	if (!is_null($authenticatedUser))
    	   echo '<li class="active"><a href="/'.$base.'/user/show/'.
    	         $authenticatedUser->getUserId().'">Dashboard</a></li>';
    	echo '<li class="dropdown">';
    	echo '</li>';
    	echo '</ul>';
    	if (!is_null($authenticatedUser)) {
    		echo '<form class="navbar-form navbar-right"
    			    method="post" action="/'.$base.'/logout">';
    		echo '<div class="form-group">';
    		echo '<span class="label label-default">Hi '.
    		          $authenticatedUser->getUserName().'</span>&nbsp; &nbsp;';
    		echo '</div>';
    		echo '<button type="submit" class="btn btn-success">Sign out</button>';
    		echo '</form>';
    	} else {
	    	echo '<form class="navbar-form navbar-right" 
	    			    method="post" action="/'.$base.'/login">';
	    	echo '<div class="form-group">';
	    	echo '<input type="text" placeholder="User name" class="form-control" name ="userName"';
	        if (!is_null($user)) 
	   	        echo 'value = "'. $user->getUserName();
	    	echo 'required></div>';
	    	echo '<div class="form-group">';
	    	echo '<input type="password" placeholder="Password" 
	    			      class="form-control" name ="password">';
	    	echo '</div>';
	    	echo '<button type="submit" class="btn btn-success">Sign in</button>';
	    	echo '<a class="btn btn-primary" href="/'.$base.'/user/new" role="button">Register</a></p>';
	    	echo '</form>';

    	}
    	echo '</div>';
    	echo '</div>';
    	echo '</nav>';
    }
    
    public static function showCategories() {
    	$base = (array_key_exists('base', $_SESSION))? $_SESSION['base']: "";
    	?>
    		 <!-- Page Content -->
        <div class="container">
    
            <div class="row">
    
                <div class="col-md-3">
                    <p class="lead">Build PCs</p>
                    <div class="list-group">
                        <a href="/<?php echo $base; ?>/questions" class="list-group-item">Custom based on your needs</a>
                        <a href="#" class="list-group-item">Build your own PC</a>
                        <a href="#" class="list-group-item">Pre-Built PCs</a>
                    </div>
                </div>
    
                <div class="col-md-9">
    
                    <div class="row carousel-holder">
    
    
                    </div>
                    <div class="row">
                    <script>
       					 $('.carousel').carousel({
           				 interval: 8000
       					 })
    				</script>
    		
    		<?php
    			}
    	
    	public static function showItem($item) {
    		$base = (array_key_exists('base', $_SESSION))?$_SESSION['base']: NULL;
    		
    		?>
    				<div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="./images/<?php echo $item->getImage()?>" alt="<?php echo $item -> getImage();?>">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo $item->getPrice();?></h4>
                                    <h4><a href="<?php echo "/" .$base. "/item/" . $item->getBuildId();?>"><?php echo $item->getMboardId();?></a>
                                    </h4>
                                    <p><?php echo $item->getcpuId();?></p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">12 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                       
    	
    	<?php
    		}
    
    public static function showHomeFooter() {
    	echo '<footer>';
    	echo '<p>&copy; Made by Gregory Hooks, Heather Voorhees, Travis Peterson, and Eric Applonie</p>';	
    	echo '<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> and by';
    	echo '<a href="http://www.flaticon.com/authors/bogdan-rosu" title="Bogdan Rosu">';
    	echo 'Bogdan Rosu</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>';
    	echo 'licensed by <a href="http://creativecommons.org/licenses/by/3.0/"';
    	echo '		title="Creative Commons BY 3.0">CC BY 3.0</a>';
    	echo '</footer>';
    }

	public static function showFooter() {
		?>
		</div></div></div></div>
	<div class="container">
	
		<hr>
		
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; Made by Gregory Hooks, Heather Voorhees, Travis Peterson, and Eric Applonie</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
	
	
	<?php
    }
		           		
	public static function showPageEnd() { 
       echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
       echo '<script src="../../dist/js/bootstrap.min.js"></script>';
       echo '<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>';
       echo '</body></html>';
    }
}
?>