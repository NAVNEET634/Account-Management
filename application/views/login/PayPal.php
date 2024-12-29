    <div class="login-box">
      <div class="login-logo">
        <b><img src="<?php echo base_url(); ?>assets/img/ERIDEN-LOGO.png" width="80%"/></b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><b>Please enter item name and amount</b></p>
        <?php
		$paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
		$paypalID = 'eridenindia@gmail.com'; //Business Email
		?>
        <form action="<?php echo $paypalURL; ?>" method="post" class="form-horizontal">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Please enter your item name" name="item_name" value="<?php echo $_GET['ItemName'];?>">
        </div>
        <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
        <div class="form-group has-feedback">
        <input type="text" class="form-control" name="amount" value="<?php echo $_GET['Amount'];?>">
        </div>
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://accounts.eridenindia.com/login/PayPal?Success=0'>
        <input type='hidden' name='return' value='http://accounts.eridenindia.com/login/PayPal?Success=1'>
        

        
        <!-- Display the payment button. -->
        <div class="row">
        <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Pay With PayPal</button>
            </div><!-- /.col -->
    	</div>
        </form>
        
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/login.js" type="text/javascript"></script>
