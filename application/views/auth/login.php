<?php
$this->load->view('template/admin/head');

?>
<body class="login-page">
    <?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>
<div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b></a>
            </div><!-- /.login-logo -->
                <div class="login-box-body">
                <p class="login-box-msg">Nglayap Jogja</p>
                <form action="<?php echo base_url('login/check'); ?>" method="post">

                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" />
                <label for="password">Password</label>
                <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>                        
                        </div><!-- /.col -->
                 <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
                </form>

</div>
    
<?php
$this->load->view('template/admin/foot');
?>