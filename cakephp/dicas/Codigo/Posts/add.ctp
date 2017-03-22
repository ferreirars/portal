<div class="posts form">
<!-- Cria o cabeçalho do form -->
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		// Adiciona o campo title
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<!-- Finaliza o form -->
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!-- Cria um link usando o método link() do Helper HTML  -->
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
