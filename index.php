<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
        <!-- Hammer reload -->
          <script>
            // setInterval(function(){
            //   try {
            //     if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
            //     ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
            //     ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
            //     ws.onmessage = function(){
            //       var links = document.getElementsByTagName('link'); 
            //         for (var i = 0; i < links.length;i++) { 
            //         var link = links[i]; 
            //         if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
            //           href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
            //           link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
            //         }
            //       }
            //     }
            //   }catch(e){}
            // }, 1000)
          </script>
        <!-- /Hammer reload -->
      

  <link rel='stylesheet' href='assets/css/plugins/fullcalendar.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/bootstrap.datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/chosen.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.timepicker.css'>
<link rel='stylesheet' href='assets/css/plugins/daterangepicker-bs3.css'>
<link rel='stylesheet' href='assets/css/plugins/colpick.css'>
<link rel='stylesheet' href='assets/css/plugins/dropzone.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.handsontable.full.css'>
<link rel='stylesheet' href='assets/css/plugins/jscrollpane.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.icons.css'>
<link rel='stylesheet' href='assets/css/app.css'>
<link rel='stylesheet' href="assets/fonts/font-google.css">

  <link href="assets/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title>SI Produksi: UMKM Kerupuk Krembung</title>

</head>

<body class="glossed">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42863888-4', 'pinsupreme.com');
  ga('send', 'pageview');

</script>
<div class="all-wrapper fixed-header left-menu">
  <div class="page-header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
    </div>
    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="assets/images/avatar-small.jpg" alt="">
        </div>
        <div class="user-name-w">
          Lionel Messi <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="gantipassword.php"><i class="fa fa-unlock-alt"></i> Ganti Password </a></li>
        <li><a href="#"><i class="fa fa-power-off"></i> Keluar Dari Sistem </a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan"><i class="fa fa-home"></i></a>
  <a class="menu-toggler" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tampilkan / Hilangkan"><i class="fa fa-bars"></i></a>
  <h1>Halaman Depan</h1>
</div>
  <div class="side">
  <div class="sidebar-wrapper">
  <ul>
    <li class='current'>
      <a class='current' href="index.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Halaman Depan">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li>
      <a href="pemasok.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menu Utama">
        <i class="fa fa-th-large"></i>
      </a>
    </li>
    <li>
      <a href="bom.php" data-toggle="tooltip" data-placement="right" title="" data-original-title="Resep">
        <i class="fa fa-book"></i>
      </a>
    </li>
  </ul>
</div>
  <div class="sub-sidebar-wrapper">
  <ul class="nav">
    <li><a href="#widget_stats">Statistics</a></li>
    <li><a href="#widget_profit_chart">Profit Charts</a></li>
    <li><a href="#widget_tasks_list">Tasks List</a></li>
    <li><a href="#widget_real_time_chart">Real Time Chart</a></li>
    <li><a href="#widget_server_activity">Server Activity</a></li>
    <li><a href="#widget_calendar">Calendar</a></li>
    <li><a href="#widget_tabs">Tabs</a></li>
  </ul>
</div>
  </div>
  <div class="main-content">
    <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Bread</a></li>
  <li class="active">Example</li>
</ol>
<div class="alert alert-warning alert-dismissable bottom-margin">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <i class="fa fa-exclamation-circle"></i> <strong>Welcome!</strong> This is a dashboard of the powerful admin template.
</div>
<div class="row">
  <div class="col-md-6">
    <div class="widget widget-blue">
      <span class="offset_anchor" id="widget_stats"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-bar-chart-o"></i> Statistics</h3>
      </div>
      <div class="widget-content">
        <div class="shadowed-bottom">
          <div class="row">
            <div class="col-xs-6">
              <div class="white-block clearfix">
                <div class="value-block changed-up-border pull-left changed-up">
                  <div class="value-self">910
                    <span class="changed-icon"><i class="fa fa-caret-up"></i></span>
                    <span class="changed-value">+2.00%</span>
                  </div>
                  <div class="value-sub value-sub-bigger">Products Sold</div>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="white-block clearfix">
                <div class="value-block changed-down-border pull-left changed-down">
                  <div class="value-self">320
                      <span class="changed-icon"><i class="fa fa-caret-down"></i></span>
                      <span class="changed-value">+5.00%</span></div>
                  <div class="value-sub value-sub-bigger">New Users</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="areachart-small" style="height: 150px;"></div>
      </div>
    </div>

    <div class="widget widget-red">
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-dashboard"></i> Gauges</h3>
      </div>
      <div class="widget-content">
        <div class="row">
          <div class="col-sm-4"><div id="gauge-red" style="height:90px"></div></div>
          <div class="col-sm-4"><div id="gauge-green" style="height:90px"></div></div>
          <div class="col-sm-4"><div id="gauge-blue" style="height:90px"></div></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="widget widget-blue">
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-bar-chart-o"></i> Bar Chart</h3>
      </div>
      <div class="widget-content">

        <div class="shadowed-bottom">
          <div class="row">
            <div class="col-sm-4 bordered">
              <div class="value-block text-center">
                <div class="value-self">1,120</div>
                <div class="value-sub">Total Visitors</div>
              </div>
            </div>
            <div class="col-sm-8">
              <form class="form-inline form-period-selector">
                <label class="control-label">Time Period:</label><br>
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
              </form>
            </div>
          </div>
        </div>
        <div class="padded">
          <div id="users_barchart" style="height: 330px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="widget widget-green">
  <span class="offset_anchor" id="widget_profit_chart"></span>
  <div class="widget-title">
    <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
    <h3><i class="fa fa-bar-chart-o"></i> Profit Chart</h3>
  </div>
  <div class="widget-content">
    <ul class="nav nav-pills">
      <li class="active"><a href="#">Hour</a></li>
      <li><a href="#">Day</a></li>
      <li><a href="#">Month</a></li>
      <li class="hidden-xs"><a href="#">Year</a></li>
    </ul>
    <div class="widget-content-tp">
      <div class="padded-no-sides">
        <div id="areachart" style="height: 250px;"></div>
      </div>

      <div class="shadowed-top top-margin">
        <div class="row">
          <div class="col-lg-4 col-md-5 col-sm-6 bordered">
            <div class="value-block value-bigger changed-up some-left-padding changed-up-border">
              <div class="value-self">
                $5,450
                <span class="changed-icon"><i class="fa fa-caret-up"></i></span>
                <span class="changed-value">+5.00%</span>
              </div>
              <div class="value-sub">Average of $450.35 Per Day</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 visible-md visible-lg bordered">
            <div class="value-block text-center">
              <div class="value-self">520</div>
              <div class="value-sub">Total Sales</div>
            </div>
          </div>
          <div class="col-lg-2 bordered visible-lg">
            <div class="value-block text-center">
              <div class="value-self">1,120</div>
              <div class="value-sub">Total Visitors</div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <form class="form-inline form-period-selector">
              <label class="control-label">Time Period:</label><br>
              <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
              <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="widget widget-blue">
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-user"></i> Users List</h3>
      </div>
      <div class="widget-content">
        <ul class="users-list">
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <span class="label label-success pull-right">Active</span>
                <h4>John Mayers</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <span class="label label-warning pull-right">Deactivated</span>
                <h4>John Mayers</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <span class="label label-success pull-right">Active</span>
                <h4>John Mayers</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <span class="label label-success pull-right">Active</span>
                <h4>John Mayers</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <span class="label label-success pull-right">Active</span>
                <h4>John Mayers</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="widget widget-red">
      <span class="offset_anchor" id="widget_tasks_list"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-tasks"></i> Tasks List</h3>
      </div>
      <div class="widget-content">
        <ul class="tasks-list">
          <li>
            <div class="label label-warning">Nov 2</div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Do some clean up for the party
              </label>
            </div>
          </li>
          <li>
            <div class="label label-danger">Oct 12</div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Wrap presents for Christmas
              </label>
            </div>
          </li>
          <li>
            <div class="label label-danger">Dec 15</div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Finish the coding for the upcoming project
              </label>
            </div>
          </li>
          <li>
            <div class="label label-danger">Jul 2</div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Buy milk and cookies for breakfast tomorrow
              </label>
            </div>
          </li>
          <li class="task-done">
            <div class="label label-warning">Oct 22</div>
            <div class="checkbox">
              <label>
                <input type="checkbox" checked> Send the stroller back to amazon because it's broken
              </label>
            </div>
          </li>
          <li class="task-done">
            <div class="label label-warning">Aug 3</div>
            <div class="checkbox">
              <label>
                <input type="checkbox" checked> Update the code for the version that was broken
              </label>
            </div>
          </li>
          <li>
            <div class="label label-danger">Feb 24</div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Water the plant before I go to vacation
              </label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="widget widget-blue">
      <span class="offset_anchor" id="widget_real_time_chart"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-signal"></i> Real Time Chart</h3>
      </div>
      <div class="widget-content">
        <div class="row">
          <div class="col-md-4">
            <div class="big-legend-w shadow-right">
              <div class="legend-label">Pageviews</div>
              <div class="legend-value" id="plot-chart-value">15</div>
              <div class="stacked-bar">
                <div class="bar-value bar-value-color-red visible-tooltip" style="width: 35%" data-toggle="tooltip" data-placement="top" data-original-title="Safari"></div>
                <div class="bar-value bar-value-color-orange" style="width: 10%" data-toggle="tooltip" data-placement="top" data-original-title="Opera"></div>
                <div class="bar-value bar-value-color-green" style="width: 30%" data-toggle="tooltip" data-placement="top" data-original-title="Firefox"></div>
                <div class="bar-value bar-value-color-blue" style="width: 25%" data-toggle="tooltip" data-placement="top" data-original-title="Chrome"></div>
              </div>
              <div class="legend-sub-label">Total number of pageviews</div>
            </div>
          </div>
          <div class="col-md-8">
            <div id="placeholder" style="height: 250px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="widget widget-green">
      <span class="offset_anchor" id="widget_server_activity"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-warning"></i> Server Activity</h3>
      </div>
      <div class="widget-content">
        <ul class="activity-list">
          <li>
            <div class="row">
              <div class="col-xs-9"><p><i class="fa fa-bell activity-image"></i> You have 5 pending alerts for account</p></div>
              <div class="col-xs-3 text-right"><span class="activity-time">5 min</span></div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-9"><p><i class="fa fa-fire activity-image"></i> Server crash happened <span class="label label-danger">warning</span></p></div>
              <div class="col-xs-3 text-right"><span class="activity-time">8 min</span></div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-9"><p><i class="fa fa-flag-o activity-image"></i> You have 5 pending alerts for account</p></div>
              <div class="col-xs-3 text-right"><span class="activity-time">12 min</span></div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-9"><p><i class="fa fa-smile-o activity-image"></i> New user registration <span class="label label-success">great</span></p></div>
              <div class="col-xs-3 text-right"><span class="activity-time">15 min</span></div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-9"><p><i class="fa fa-bell activity-image"></i> You have 5 pending alerts for account</p></div>
              <div class="col-xs-3 text-right"><span class="activity-time">25 min</span></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="widget widget-blue">
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-comments"></i> User Chat</h3>
      </div>
      <div class="widget-content">
        <ul class="chat-messages-list">
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <div class="chat-bubble chat-bubble-right">
                  <div class="bubble-arrow"></div>
                  <div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
                  <p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-10">
                <div class="chat-bubble chat-bubble-left">
                  <div class="bubble-arrow"></div>
                  <div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
                  <p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="row">
              <div class="col-xs-2">
                <div class="avatar">
                  <img src="assets/images/avatar-small.jpg" alt="">
                </div>
              </div>
              <div class="col-xs-10">
                <div class="chat-bubble chat-bubble-right">
                  <div class="bubble-arrow"></div>
                  <div class="meta-info"><a href="#">Andres Iniesta</a> on Jun 25</div>
                  <p>Collaboratively administrate empowered markets via plug-and-play networks.</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <div class="widget-foot">
          <div class="create-chat-message-w">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Your message here...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Send</button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="widget widget-green">
      <span class="offset_anchor" id="stat_charts_anchor"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-bar-chart-o"></i> Statistics</h3>
      </div>
      <div class="widget-content">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 text-center">
            <div class="widget-content-blue-wrapper changed-up">
              <div class="widget-content-blue-inner padded">
                <div class="pre-value-block"><i class="fa fa-dashboard"></i> Total Visits</div>
                <div class="value-block">
                  <div class="value-self">10,520</div>
                  <div class="value-sub">This Week</div>
                </div>
                <span class="dynamicsparkline">Loading..</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center">
            <div class="widget-content-blue-wrapper changed-up">
              <div class="widget-content-blue-inner padded">
                <div class="pre-value-block"><i class="fa fa-user"></i> New Users</div>
                <div class="value-block">
                  <div class="value-self">1,120</div>
                  <div class="value-sub">This Month</div>
                </div>
                <span class="dynamicsparkline">Loading..</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center hidden-md">
            <div class="widget-content-blue-wrapper changed-up">
              <div class="widget-content-blue-inner padded">
                <div class="pre-value-block"><i class="fa fa-sign-in"></i> Sold Items</div>
                <div class="value-block">
                  <div class="value-self">275</div>
                  <div class="value-sub">This Week</div>
                </div>
                <span class="dynamicsparkline">Loading..</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 text-center">
            <div class="widget-content-blue-wrapper changed-up">
              <div class="widget-content-blue-inner padded">
                <div class="pre-value-block"><i class="fa fa-money"></i> Net Profit</div>
                <div class="value-block">
                  <div class="value-self">$9,240</div>
                  <div class="value-sub">Yesterday</div>
                </div>
                <span class="dynamicbars">Loading..</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="row">

  <div class="col-md-8">
    <div class="widget widget-blue">
      <span class="offset_anchor" id="widget_calendar"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-calendar"></i> Calendar</h3>
      </div>
      <div class="widget-content">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="widget widget-red">
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-bullseye"></i> Pie Chart</h3>
      </div>
      <div class="widget-content">
        <div id="piechart" style=""></div>
        <table class="table table-bordered" id="topsellers_table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Floor Lamp</td>
              <td>2</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Coffee Mug</td>
              <td>4</td>
              <td>7</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="widget widget-bordered">
  <div class="widget-title bottom-margin">
    <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
    <h3><i class="fa fa-bullseye"></i> Circular Charts</h3>
  </div>
  <div class="widget-content">
    <div class="row bottom-margin">
      <div class="col-lg-3 col-md-4 col-sm-6 text-center">
        <input type="text" value="75" class="knob" data-fgColor="#df6064" data-linecap="round" data-width="150">
      </div>
      <div class="col-lg-3 hidden-md col-sm-6 text-center">
        <input type="text" value="65" class="knob" data-fgColor="#8963ac" data-linecap="round" data-width="150">
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 text-center">
        <input type="text" value="85" class="knob" data-fgColor="#61a9dc" data-linecap="round" data-width="150">
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 text-center">
        <input type="text" value="68" class="knob" data-fgColor="#71c280" data-linecap="round" data-width="150">
      </div>
    </div>
  </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <span class="offset_anchor" id="widget_tabs"></span>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_pie_chart" data-toggle="tab"><i class="fa fa-bullseye"></i> Pie Chart</a></li>
      <li><a href="#tab_bar_chart" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Bar Alert</a></li>
      <li class="hidden-md hidden-xs"><a href="#tab_table" data-toggle="tab"><i class="fa fa-th"></i> Table</a></li>
    </ul>
    <div class="tab-content bottom-margin">
      <div class="tab-pane active" id="tab_pie_chart">
        <div class="shadowed-bottom">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-3 bordered">
              <div class="value-block padded-left text-center">
                <div class="value-self">520</div>
                <div class="value-sub">Total Sales</div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-3 bordered hidden-md">
              <div class="value-block text-center">
                <div class="value-self">1,120</div>
                <div class="value-sub">Total Visitors</div>
              </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6">
              <form class="form-inline form-period-selector">
                <label class="control-label">Time Period:</label><br>
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
              </form>
            </div>
          </div>
        </div>
        <div class="padded">
          <div id="topsellers_barchart"></div>
        </div>
      </div>
      <div class="tab-pane" id="tab_bar_chart">
        <div class="shadowed-bottom">
          <div class="row">
            <div class="col-md-3 bordered">
              <div class="value-block padded-left text-center">
                <div class="value-self">256</div>
                <div class="value-sub">Total Sales</div>
              </div>
            </div>
            <div class="col-lg-3 bordered hidden-md">
              <div class="value-block text-center">
                <div class="value-self">3,420</div>
                <div class="value-sub">Total Visitors</div>
              </div>
            </div>
            <div class="col-lg-6 col-md-9">
              <form class="form-inline form-period-selector">
                <label class="control-label">Time Period:</label><br>
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
              </form>
            </div>
          </div>
        </div>
        <div class="padded">
          <div class="alert alert-warning">
            <i class="fa fa-exclamation-circle"></i> <strong>Message example!</strong> This is an example of how to handle a case when there is no data to load for a chart.</div>
        </div>
      </div>
      <div class="tab-pane" id="tab_table">
        <div class="shadowed-bottom">
          <div class="row">
            <div class="col-md-3 bordered">
              <div class="value-block padded-left text-center">
                <div class="value-self">112</div>
                <div class="value-sub">Total Sales</div>
              </div>
            </div>
            <div class="col-lg-3 bordered hidden-md">
              <div class="value-block text-center">
                <div class="value-self">2,340</div>
                <div class="value-sub">Total Visitors</div>
              </div>
            </div>
            <div class="col-lg-6 col-md-9">
              <form class="form-inline form-period-selector">
                <label class="control-label">Time Period:</label><br>
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
                <input type="text" placeholder="01/12/2011" class="form-control input-sm input-datepicker">
              </form>
            </div>
          </div>
        </div>
        <div class="padded">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Floor Lamp</td>
              <td>2</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Coffee Mug</td>
              <td>4</td>
              <td>7</td>
            </tr>
            <tr>
              <td>Television</td>
              <td>1</td>
              <td>3</td>
            </tr>
            <tr>
              <td>Red Carpet</td>
              <td>6</td>
              <td>5</td>
            </tr>
            <tr>
              <td>Laptop</td>
              <td>3</td>
              <td>6</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
  <div class="page-footer">
  © 2013 Saturn Admin Template.
</div>
</div>


<script src="assets/ajax/jquery.min.js"></script>
<script src="assets/ajax/jquery-ui.min.js"></script>
<script src='assets/js/plugins/jquery.pnotify.js'></script>
<script src='assets/js/plugins/jquery.sparkline.min.js'></script>
<script src='assets/js/plugins/mwheelIntent.js'></script>
<script src='assets/js/plugins/mousewheel.js'></script>
<script src='assets/js/bootstrap/tab.js'></script>
<script src='assets/js/bootstrap/dropdown.js'></script>
<script src='assets/js/bootstrap/tooltip.js'></script>
<script src='assets/js/bootstrap/collapse.js'></script>
<script src='assets/js/bootstrap/scrollspy.js'></script>
<script src='assets/js/plugins/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap/transition.js'></script>
<script src='assets/js/plugins/jquery.knob.js'></script>
<script src='assets/js/plugins/jquery.flot.min.js'></script>
<script src='assets/js/plugins/fullcalendar.js'></script>
<script src='assets/js/plugins/datatables/datatables.min.js'></script>
<script src='assets/js/plugins/chosen.jquery.min.js'></script>
<script src='assets/js/plugins/jquery.timepicker.min.js'></script>
<script src='assets/js/plugins/daterangepicker.js'></script>
<script src='assets/js/plugins/colpick.js'></script>
<script src='assets/js/plugins/moment.min.js'></script>
<script src='assets/js/plugins/datatables/bootstrap.datatables.js'></script>
<script src='assets/js/bootstrap/modal.js'></script>
<script src='assets/js/plugins/raphael-min.js'></script>
<script src='assets/js/plugins/morris-0.4.3.min.js'></script>
<script src='assets/js/plugins/justgage.1.0.1.min.js'></script>
<script src='assets/js/plugins/jquery.maskedinput.min.js'></script>
<script src='assets/js/plugins/jquery.maskmoney.js'></script>
<script src='assets/js/plugins/summernote.js'></script>
<script src='assets/js/plugins/dropzone-amd-module.js'></script>
<script src='assets/js/plugins/jquery.validate.min.js'></script>
<script src='assets/js/plugins/jquery.bootstrap.wizard.min.js'></script>
<script src='assets/js/plugins/jscrollpane.min.js'></script>
<script src='assets/js/application.js'></script>

<script src='assets/js/template_js/dashboard.js'></script>

<!-- @include _footer