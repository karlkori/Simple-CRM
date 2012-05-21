<?php header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Simple CRM</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="<?php echo base_url('/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/css/style.css'); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url('/img/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('img/apple-touch-icon.png'); ?>">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('img/apple-touch-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('img/apple-touch-icon-114x114.png'); ?>">

  </head>
  <body>
    <div class="header">
      <h1>Полиграфия</h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">      
        <div class="span2">
          <div class="sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Меню</li>
              <li <?php if ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') echo 'class="active"'; ?> >
                  <?php echo anchor('dashboard', '<i class="icon-home"></i> Консоль'); ?>
              </li>
              <li <?php if ($this->uri->segment(1) == 'clients') echo 'class="active"'; ?> >
                  <?php echo anchor('clients/display', '<i class="icon-user"></i> Клиенты'); ?>
              </li>              
              <li <?php if ($this->uri->segment(1) == 'orders') echo 'class="active"'; ?> >
                  <?php echo anchor('orders/display', '<i class="icon-book"></i> Заказы'); ?>
              </li>
              <li class="nav-header"><hr /></li>
              <li <?php if ($this->uri->segment(2) == 'settings') echo 'class="active"'; ?> >
                  <?php echo anchor('page/settings', '<i class="icon-cog"></i> Настройки'); ?>
              </li>
              <li <?php if ($this->uri->segment(2) == 'logout') echo 'class="active"'; ?> >
                  <?php echo anchor('page/help', '<i class="icon-question-sign"></i> Справка'); ?>
              </li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <?php $this->load->view($part_name); ?>

      </div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Simple CRM 2012</p>

      </footer>

    </div><!--/.fluid-container-->

    <script src="<?php echo base_url('/js/jquery-1.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/bootstrap.js'); ?>"></script>
    
  </body>
</html>                