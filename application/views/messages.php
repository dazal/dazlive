        <?if($this->session->flashdata('flashSuccess')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashSuccess')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'success'
				});
			</script>
          <?endif?> 

        <?if($this->session->flashdata('flashError')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashError')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'error'
				});
			</script>
          <?endif?> 
        <?if($this->session->flashdata('flashInfo')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashInfo')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'info'
				});
			</script>
          <?endif?> 
        <?if($this->session->flashdata('flashWarning')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashWarning')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'warning'
				});
			</script>
          <?endif?>  
        <?if($this->session->flashdata('flashAlert')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashAlert')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'alert'
				});
			</script>
          <?endif?>  
        <?if($this->session->flashdata('flashConfirm')):?>
          	<script type="text/javascript">
          	//alert('<?=$this->session->flashdata('flashSuccess')?>!');
				//$.noty.defaults.killer = true;
				noty({
				   text: '<?=$this->session->flashdata('flashConfirm')?>!',
				   layout: 'bottomRight',
				   animateOpen: ['opacity','show'],
				   type: 'confirm'
				});
			</script>
          <?endif?> 