<?php
if(is_home()||is_page('random')){
  $now = time();
  $tomorrow = strtotime("tomorrow 10:00:00");
  $rem =  $tomorrow - $now;
  $seconds = (date('H',$rem)*60*60)+(date('i',$rem)*60)+date('s',$rem);
  $width = (($seconds*100)/-86400)+100;
?>
  <footer class="row">
      <div class="columns">
        <div class="progress" id="lifetime">
        <?php if(is_home()){ ?>
          <span class="meter" style="width:0%"></span>
        </div><!-- /.progress -->
        <p>...</p>
          <?php } else if(is_page('random')){ ?>
          <span class="meter"></span>
        </div><!-- /.progress -->
        <p>✝ This link died <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>.</p>
          <?php } ?>
      </div><!-- /.columns -->
  </footer>
<?php } ?>
  <a class="exit-off-canvas"></a>
  </div><!-- /.off-canvas-wrap -->
</div><!-- /.inner-wrap -->
    <script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
      function setHeight(){
        h = $(window).height();
        ch = $('.main-section').height();
        mt = $('.tab-bar').height();
        mb = $('footer').height();
        if(ch<h){$('.main-section').height(h-mt-mb);}
        else{$('.main-section').height('auto');}
      }
      setHeight();
      $( window ).resize(function() {
        setHeight();
      });
      if($('body').hasClass('home')){
        timelink = 'time.php';
        $.ajax({
          url: timelink,
          context: document.body
        }).done(function(data) {
          var res = data.split(",");
          estimated = res[0];
          width = res[1];
          if($('body').hasClass('home')){
            $('footer>.columns>p').html('Estimated lifetime: '+estimated).animate({
              opacity: 1
            }, 1000);
            $('#lifetime .meter').animate({
              width: width+'%'
            }, 750);
          }
        });
      }
      $('input[value=""]').addClass('empty');
      $('input').keyup(function(){
        if( $(this).val() == ""){$(this).addClass("empty");}else{$(this).removeClass("empty");}
      });
      if($('textarea').val()==''){$('textarea').addClass('empty');}
      $('textarea').keyup(function(){
        if( $(this).val() == ""){$(this).addClass("empty");}else{$(this).removeClass("empty");}
      });
    </script>
    <?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59509279-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>