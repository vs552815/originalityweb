 <?php
        echo $this->Html->css(array('https://cdn.jsdelivr.net/g/sweetalert2@6.6.2(sweetalert2.min.css+sweetalert2.css)'));
         echo $this->Html->script('https://cdn.jsdelivr.net/g/sweetalert2@6.6.2(sweetalert2.min.js+sweetalert2.js)');
        
        ?>
<script>
    
    swal({
  text:  "Your story post successfully. Please Wait for Approval.",
   type: "success"
});
</script>
