<div id="LoginPopup" class="modal fade">
    <div class="modal-dialog" id="login-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                <h4 style="text-align:center;font-size:23px; ">Sign in</h4>

                <?php echo $this->Session->flash(); ?>
            </div>

            <div class="modal-body" style="padding-bottom: 0px;">
                <div style="width:95%;margin:0 auto;">
                    <?php echo $this->Form->create('User', array('id' => 'frmLogin','autocomplete'=>'off')); ?>
                    <div class="form-group has-success has-feedback" >
                        <div class="input-group" id="email-lowercase">
                            <span class="input-group-addon" style="    background-color: orange;
                                  border-color: orange;"><span class="glyphicon glyphicon-user" style="color:#fff;"></span>
                            </span>
                            <?php echo $this->Form->input('email', array('id' => 'login_email', 'class' => 'form-control', 'placeholder' => 'Email Address', 'label' => false, 'div' => false, 'aria-describedby' => 'inputGroupSuccess1Status', 'required','style'=>' text-transform: lowercase;')); ?>
                        </div>
                    </div>
                    <div class="form-group" >

                        <div class="input-group">
                            <span class="input-group-addon" style="    background-color: orange;
                                  border-color: orange;"><span class="fa fa-lock" style="color:#fff;"></span>
                                <span class="fa fa-unlock-alt" style="color:#fff;display: none;" ></span>
                            </span>
                            <?php echo $this->Form->input('password', array('id' => 'login_password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'div' => false, 'required')); ?>
                        </div>
                        
                    </div>
                    <div >
                        <button type="submit" class="btn-lg btn-warning" >Log in</button>
                    </div><hr class="style7">
                   
                    <?php echo $this->Form->end(); ?>                    
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>