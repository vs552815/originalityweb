<?php
if ($this->Paginator->hasNext()) {
    echo $this->Paginator->next('VIEW MORE ', array('tag' => 'p', 'escape' => false), null, array('class' => 'next disabled nxt',
        'escape' => false));
}
?>
<span><?php echo $this->Paginator->counter('Showing {:end} of  {:count}'); ?></span>