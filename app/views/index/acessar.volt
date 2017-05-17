<?php

echo $this->view->senha; ?>
{{ form('cphalcon/acessar', 'method': 'post') }}

 <label for="name">E-mail</label>
    {{ text_field("email") }}

    <label for="type">Senha</label>
    {{ passwordField("senha") }}



    {{ submit_button('Entrar') }}

{{ end_form() }}