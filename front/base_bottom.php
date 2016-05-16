<footer>
	<div class="container-fluid">
		<div class="row footer f-line1">
			<div class="col-md-3">
				<a href="<?php echo $base_url ?>">
					<img src="<?php echo $base_url ?>/front/img/logo_v.3.png" alt="" class="logo-footer">
				</a>
			</div>
			<div class="col-md-6 text-center">
				<ul class="nav-footer">
					<li>
						<a href="<?php echo $base_url; ?>">Места</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>/articles">Статьи</a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 text-right">
				<ul class="social-footer">
					<li>
						<a href="#"><i class="fa fa-vk"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-facebook"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-twitter"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-instagram"></i> </a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row footer f-line2">
			<div class="col-md-6">
				<p class="footer-p">Copyright GreatView.ru 2016 <?php $nowYear=date("Y"); if ($nowYear > '2016') {
					echo "- ".$nowYear;
				};
				 ?></p>
			</div>
			<div class="col-md-6 text-right">
				<ul class="footer-rules">
					<li>
						<a href="<?php echo $base_url ?>/rules/privacy.php">политика конфидициальности</a>
					</li>
					<li>
						<a href="<?php echo $base_url ?>/rules/index.php">правила</a>
					</li>
					<li>
						<a href="<?php echo $base_url ?>/rules/denial.php">отказ от ответственности</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
		<script src="<?php echo $base_url ?>/js/jquery-2.2.3.min.js"></script>
		<script src="<?php echo $base_url ?>/js/imagelightbox.min.js"></script>
		<script src="<?php echo $base_url ?>/js/jquery.cookie.js"></script>
		<script src="<?php echo $base_url ?>/js/ajax-form.js"></script>
		<script src="<?php echo $base_url ?>/js/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo $base_url ?>/js/masonry.pkgd.min.js"></script>
		<script type="text/javascript">

			// masonry
			var grid = document.querySelector('#grid-container');
			var msnry;
			imagesLoaded( grid, function() {
				msnry = new Masonry( grid, {
					itemSelector: '.grid-item',
					columnWidth: '.col-md-4',
					percentPosition: true
				});
			});
<?php //if (!Auth\User::isAuthorized()): ?>
			//password show/hide
			function psh(id) {
				if (document.getElementById(id).getAttribute('type') == 'password') {
					document.getElementById(id).setAttribute('type', 'text');
					document.getElementById('psh-control').classList.add('fa-lock');
					document.getElementById('psh-control').classList.remove('fa-unlock');
				} else {
					document.getElementById(id).setAttribute('type', 'password');
					document.getElementById('psh-control').classList.remove('fa-lock');
					document.getElementById('psh-control').classList.add('fa-unlock');
				}
			};

			//modals
			function modal_hide() {
				document.getElementById('m-login').classList.add('hidden');
				document.getElementById('m-reg').classList.add('hidden');
				document.getElementById('overlayer').classList.add('hidden');
				document.getElementById('id-body').classList.remove('modal-on');
			};
			function modal_show(modal) {
				document.getElementById('id-body').classList.add('modal-on');
				document.getElementById('overlayer').classList.remove('hidden');
				document.getElementById(modal).classList.remove('hidden');
			};
<?php //else: ?>
			// user menu
			function umenu() {
				$(".nav-usermenu").toggleClass("hidden");
				$(".nav-user-button").toggleClass("active");
			}
	<?php //if ($_SESSION["role"]>'2'): ?>
			//admin panel
			if ($.cookie('adminpanel') == "true") {
				$("#adminpanel").prop('checked',true);
			}else{
				$("#adminpanel").prop('checked',false);
			};
			function adminPanel() {
				var checked = $("#adminpanel").is(':checked');
				if (checked) {
                	$(".dev-menu").slideDown("slow"); 
                	$.cookie('adminpanel', 'true', {path: '/' });
            	} else {
                	$(".dev-menu").hide(); 
                	$.cookie('adminpanel', 'false', {path: '/' });
            	};
			};
			adminPanel();
			$("#adminpanel").change(function () {
            	adminPanel();
        	});
    <?php //endif; ?>
<?php //endif; ?>
		</script>
		<script>

    $( function()
    {
        var activityIndicatorOn = function()
            {
                $( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
            },
            activityIndicatorOff = function()
            {
                $( '#imagelightbox-loading' ).remove();
            },

            overlayOn = function()
            {
                $( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
            },
            overlayOff = function()
            {
                $( '#imagelightbox-overlay' ).remove();
            },

            closeButtonOn = function( instance )
            {
                $( '<a href="#" id="imagelightbox-close">Close</a>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });
            },
            closeButtonOff = function()
            {
                $( '#imagelightbox-close' ).remove();
            },

            captionOn = function()
            {
                var description = '';
                if( description.length > 0 )
                    $( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );
            },
            captionOff = function()
            {
                $( '#imagelightbox-caption' ).remove();
            },

            navigationOn = function( instance, selector )
            {
                var images = $( selector );
                if( images.length )
                {
                    var nav = $( '<div id="imagelightbox-nav"></div>' );
                    for( var i = 0; i < images.length; i++ )
                        nav.append( '<a href="#"></a>' );

                    nav.appendTo( 'body' );
                    nav.on( 'click touchend', function(){ return false; });

                    var navItems = nav.find( 'a' );
                    navItems.on( 'click touchend', function()
                    {
                        var $this = $( this );
                        if( images.eq( $this.index() ).attr( 'href' ) != $( '#imagelightbox' ).attr( 'src' ) )
                            instance.switchImageLightbox( $this.index() );

                        navItems.removeClass( 'active' );
                        navItems.eq( $this.index() ).addClass( 'active' );

                        return false;
                    })
                    .on( 'touchend', function(){ return false; });
                }
            },
            navigationUpdate = function( selector )
            {
                var items = $( '#imagelightbox-nav a' );
                items.removeClass( 'active' );
                items.eq( $( selector ).filter( '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ).index( selector ) ).addClass( 'active' );
            },
            navigationOff = function()
            {
                $( '#imagelightbox-nav' ).remove();
            };

        var instanceF = $( 'a[data-imagelightbox="f"]' ).imageLightbox(
        {
            onStart:        function() { overlayOn(); closeButtonOn( instanceF ); },
            onEnd:          function() { overlayOff(); captionOff(); closeButtonOff(); activityIndicatorOff(); },
            onLoadStart:    function() { captionOff(); activityIndicatorOn(); },
            onLoadEnd:      function() { captionOn(); activityIndicatorOff(); }
        });

    });
</script>
	</body>
</html>