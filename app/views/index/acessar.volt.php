<?php

echo $this->view->senha; ?>
<?php echo $this->tag->form(array('cphalcon/acessar', 'method' => 'post')); ?>

 <label for="name">E-mail</label>
    <?php echo $this->tag->textField(array('email')); ?>

    <label for="type">Senha</label>
    <?php echo $this->tag->passwordfield('senha'); ?>



    <?php echo $this->tag->submitButton(array('Entrar')); ?>

<?php echo $this->tag->endForm(); ?>