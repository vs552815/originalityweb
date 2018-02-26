<div id="LoginPopup" class="modal fade">
    <div class="modal-dialog" id="login-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 style="text-align:center;font-size:23px; ">Sign in</h4>

                <?php echo $this->Session->flash(); ?>
            </div>

            <div class="modal-body">
                <div class="row">
               
                    <?php echo $this->Form->create('User', array('id' => 'frmLogin', 'autocomplete' => 'off')); ?>

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <?php echo $this->Form->input('email', array('id' => 'login_email', 'class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'div' => false, 'aria-describedby' => 'inputGroupSuccess1Status', 'required')); ?>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">

                        <?php echo $this->Form->input('password', array('id' => 'login_password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false, 'required')); ?>
                    </div>

                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <button class="btn btn-primary btn-web-color btn-block">Login</button>
                </div>
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <h5 style="text-align: center;cursor: pointer;" class="forget-modal"> Forgot Password?</h5>
                        <h5 style="text-align:center;">Don't have an account? <a href="javascript:void(0);" onclick="$('#SignupPopup').modal('show');" id="signup-btn" class="hide-login">Sign up</a></h5>
                    </div>
                <?php echo $this->Form->end(); ?>                    
            </div>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


<div id="SignupPopup" class="modal fade">
    <div class="modal-dialog" id="login-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 style="text-align:center;font-size:23px; ">Sign Up</h4>
            </div>
            <div class="modal-body">
              
                    <div class="row">
                          <?php echo $this->Form->create('User', array('id' => 'createuser', 'autocomplete' => 'off')); ?>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->input('fullname', array('class' => 'form-control', 'placeholder' => 'Enter Your Name', 'label' => false, 'div' => false, 'required')); ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->input('contact', array('class' => 'form-control', 'placeholder' => 'Enter Mobile Number', 'label' => false, 'div' => false)); ?>
                                  
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'div' => false, 'aria-describedby' => 'inputGroupSuccess1Status', 'required')); ?>
                   
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                     <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false, 'required')); ?>
                                </div>
<!--                                <div class="mb30">
                                    <p>Already have an account?   <a href="#">Login</a></p>
                                </div>-->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <button class="btn btn-primary btn-web-color btn-block">Register</button>
                            </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <h5 style="text-align:center;">Already registered <a href="javascript:void(0);" onclick="$('#LoginPopup').modal('show');" id="signup-btn" class="hide-signup">Sign in</a></h5>
                    </div>
                        
                        <?php echo $this->Form->end(); ?>   
                    </div>
                
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<style>
    .btn-web-color {
    background-color: #f25b6a;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    padding: 14px 24px;
    margin-bottom: 4px;
    letter-spacing: 2.2px;
    border-radius: 0px;
    line-height: 1.6;
    border: transparent;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    word-wrap: break-word;
    white-space: normal !important;
}
    .control-label { font-size: 14px; letter-spacing: 1px; color: #301c1e; margin-bottom: 10px; }
    .form-control { border-radius: 0px;
                    color: #aca5a5; 
                    font-size: 16px; 
                    font-weight: 500; 
                    width: 100%; 
                    height: 50px; 
                    padding: 14px; 
                    line-height: 1.42857143;
                    border: transparent; 
                    background-color: #f1f1f1; 
                    letter-spacing: 1px; 
                    margin-bottom: 10px; 
                     -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); 
                     box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); 
    }
</style>


<div class="modal fade"  role="dialog" id="forgot-password">
    <div class="modal-dialog modal-sm" id="login-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="refresh-page">&times;</button>
            </div>
            
            <div class="modal-body" style="    text-align: center;">
                <h4 style="margin:0px;">Reset password</h4>
                <h6 class="forgot-set-html">Enter your email address we will sent you the password reset link.</h6>
                <?php echo $this->Form->create('User', array('id' => 'frmForgot')); ?>
                <div class="form-group" id="forgot-password email-lowercase" >
                   
                        <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Enter Email ', 'label' => false, 'div' => false, 'aria-describedby' => 'inputGroupSuccess1Status', 'required')); ?>

                </div>
                 <div style="width: 50%;margin: 0 auto;">
                    <button type="submit" class="btn btn-black btn-md" id="reset-btn" style="border-radius: 20px;">Reset</button>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
           
            
        </div>
    </div>
</div>

<!-- reset password modal -->
<?php if (isset($this->params['named']['hash']) && $this->params['named']['hash'] != '') { ?>
<div class="modal fade"  role="dialog" id="reset-password">
    <div class="modal-dialog modal-sm" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="refresh-page">&times;</button>
            </div>
            <div class="modal-body" style="padding:15px;text-align:center;">
                <h4 class="rest-success-data" style="    margin: 0px;"></h4>
                <div class="hide-reset-form">
                <h4 style="text-align:center;margin:0 0 10px 0;">Enter new password</h4>
                <h6 class="error-data" style="color:red;"></h6>
                <?php echo $this->Form->create("reset", array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'user_resets')); ?>
                <?php echo $this->Form->input('User.id', array('div' => false, 'label' => false, 'type' => 'hidden', 'value' => $forgot_user_id)) ?>
                    <?php echo $this->Form->input('password1', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'New Password', 'label' => false, 'required' => true)); ?>
                <br>
                    <?php echo $this->Form->input('password2', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'label' => false, 'required' => true)); ?>
                <br>
                <div>
                    <button type="submit" class="btn btn-black btn-md" id="login-btn" style="border-radius: 20px;">Reset Password</button>
                </div>
                <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>