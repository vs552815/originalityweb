<div class="container">
    
    <h2 class="text-center">My Post</h2>
            
            <?php foreach ($user as $value) { ?>
     <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="view">
                            <div class="caption">
                                <p>47LabsDesign</p>
                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                            </div>
                            <?php echo $this->Html->image($value['Story']['image'],array('class'=>'img-responsive','style'=>'height:200px;'))?>
                         
                        </div>
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis"><?php echo $value['User']['fullname']; ?></p>
                             <p class="small" style="text-overflow: ellipsis"><?php echo $value['Story']['stroy']; ?></p>
                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                        </div>
                        <div class="stats turqbg">
                            <span class="fa fa-heart-o"> <strong>47</strong></span>
                            <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                        </div>
                    </div>
     <?php } ?>
 
    
    </div>

<style>
    
    .caption {
         box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
    position:absolute;
    top:0;
    right:0;
    background: rgba(70, 216, 210, 0.44);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}

.caption a {
    padding-right: 10px;
    color: #fff;
}
.info {
    display: block;
    padding: 10px;
    background: #eee;
    text-transform: uppercase;
    font-weight: 300;
    text-align: right;
}

.info p, .stats p {
    margin-bottom: 0;
}
.coralbg {
    background-color: #FA396F;
} 

.coral {
    color: #FA396f;
}
.info p, .stats p {
    margin-bottom: 0;
}

.stats {
    display: block;
    padding: 10px;
    color: white;
}
.turqbg {
    background-color: #46D8D2;
}

</style>