<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta name="robots" content="noindex, follow" />

  <title>Fast Company</title>

  <style type="text/css" media="all">@import "/sites/all/modules/custom/fc_ads/css/fcAds.splash.css";</style>

  <script type="text/javascript" src="/misc/jquery.js"></script>
  <script type="text/javascript" src="/misc/drupal.js"></script>

  <script type="text/javascript" src="/sites/all/modules/custom/fc_ads/js/jquery.countdown.js"></script>
  <script type="text/javascript" src="/sites/all/modules/custom/fc_ads/js/jquery.cookie.js"></script>
  <script type='text/javascript' src="/sites/all/modules/custom/fc_ads/js/fcAds.scripts.js"></script>

  <script type="text/javascript">

    function goToDestination() {
      var dest = getQueryVariable('destination');
      window.location.assign(dest);
    }

    function getQueryVariable(variable) {
      var query = window.location.search.substring(1);
      var vars = query.split("&");
      for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
          return pair[1];
        }
      }
    }

    $(document).ready(function() {
      $('.countdown .seconds').countdown({
        seconds: 14,
        callback: 'goToDestination()'
      });

      $('#skip-ad').click(function() {
        goToDestination();
        return false;
      });

    });

  </script>
</head>

<body>
  <div id="TB_window">
    <div id="TB_ajaxContent">
      <div id="header">
        <div id="logo">
          <a href="/">Fast Company</a>
        </div>
      </div>

      <div class="countdown">Your page in <span class="seconds">15</span> seconds.&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a id="skip-ad" href="http://www.fastcompany.com">Skip this ad >></a></div>

      <div class="fc_splash_ad">
        <div class="fc_splash_title">ADVERTISEMENT</div>

          <script language="JavaScript" type="text/javascript">
            ord=Math.random()*10000000000000000;
            document.write('<script language="JavaScript" src="<?php print $script_src; ?>ord=' + ord + '?" type="text/javascript"><\/script>');
          </script>

          <?php print $noscript_tag; ?>

        </div>
      </div>
    </div>
  </div>
</body>

</html>
