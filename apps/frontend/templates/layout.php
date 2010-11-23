<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- @claudiob I intend to use HTML5, but since I don't know your politics with compatibility, I'm using XHTML for now -->
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <!-- @claudiob I'm using default locations for favicon and apple icon -->
    <?php include_stylesheets() ?>
  </head>

  <body>
    <div id="page">
    <!-- @claudiob I'm using an external DIV to fix the footer at the bottom -->

      <div id="header">
        <h1>Sitefoo</h1>
        <img src="images/logo_sitefoo.png" alt="Sitefoo logo" />  
        <ul class="horizontal">
          <li><a href="#">Features &amp; benefits</a></li>
          <li><a href="#">Plans &amp; pricing</a></li>
          <li class="with_dropdown">
            <!-- @claudiob jQuery works on classes 'with_dropdown' and 'dropdown' -->
            <a href="?show=about_us">About us</a>
            <!-- @claudiob The ?show parameter is checked on the server to show dropdowns when jQuery is disabled -->
            <div class="dropdown">
              <!-- @claudiob This additional DIV separates the link from the dropdown while maintaining the hover active -->
              <ul>
                <li><a href="#">About our New York team</a></li>
                <li><a href="#">About our L.A. team</a></li>
                <li><a href="#">About our London team</a></li>
              </ul>
            </div>
          </li>
          <li><a href="#">Log in</a></li>
          <li>
            <!-- @claudiob - The tipsy could be made a dropdown by adding the 'with_dropdown' class -->
            <a href="<?php echo url_for('user/new') ?>">Sign up</a>
            <div class="tipsy">
              <a href="#">It&#8217;s free!</a>
            </div>
          </li>
        </ul>
      </div>

      <div id="content">
        <?php echo $sf_content ?>
      </div>

      <div id="footer">
        <div id="footer_left">
          <ul id="actions" class="hor">
            <li class="action_1"><a href="#">Watch a brief video showing how Sitefoo works.</a></li>
            <li class="action_2"><a href="#">Sign up for Sitefoo. It&#8217;s free and it&#8217;s fun!</a></li>
            <li class="action_3"><img src="images/ribbon.png" alt="win">
              <a href="#">Enter to win an iPod Nano from Awesome Site.
              </a>
             </li>
          </ul>

          <ul id="nav" class="hor">
            <li><a href="#">API</a></li>
            <li><a href="#">FAQ &amp; help</a></li>
            <li><a href="#">Privacy policy</a></li>
            <li><a href="#">Terms &amp; conditions</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
        <div id="footer_right">
          <div id="tweets">
          <p>Recent tweets</p>
          <ul>
            <li>
              <a href="#">Lorem ipsum dolor sit amet, consectetur adipis elit. Proin eleifend ante et nibh consequat.</a><br />
              <span class="date">posted 2 days ago</span>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet, consectetur adipis elit. Proin eleifend ante et nibh consequat.</a><br />
              <span class="date">posted 2 days ago</span>
            </li>
          </ul>
          </div>

          <div id="copyright">
            Copyright &copy; 2010 Sitefoo. All Rights Reserved.
          </div>
        </div>
      </div>
  </div>
  <?php use_javascript('jquery.min.js')?>
  <?php include_javascripts() ?>
  <!-- @claudiob I'm using a local version of jQuery, but in production should http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js -->
  <!-- @claudiob I'm using separate scripts, but they should be grouped together in production -->
  </body>
</html>