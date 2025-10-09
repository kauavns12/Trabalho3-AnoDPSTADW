<?php

require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - FRIV GAMES & WIKI</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./estilo/estilo_formUsuario.css">
</head>
<body>
    <!-- Elementos decorativos de fundo -->
    <div class="decoration"></div>
    <div class="decoration"></div>
    
    <div class="container">
        <div class="header">
            <h1>FRIV GAMES & WIKI</h1>
        </div>
        
        <div class="form-container">
            <h2 class="section-title">CADASTRO</h2>
            
            <form id="formulario" action="../controle/salvarUsuario.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">NOME DE USUÁRIO</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome de usuário">
                </div>
                
                <div class="form-group">
                    <label for="gmail">EMAIL</label>
                    <input type="text" name="gmail" id="gmail" placeholder="Digite seu e-mail">
                </div>
                
                <div class="form-group">
                    <label for="gmail2">CONFIRME SEU E-MAIL</label>
                    <input type="text" name="gmail2" id="gmail2" placeholder="Confirme seu e-mail">
                </div>
                
                <div class="form-group">
                    <label for="senha">SENHA</label>
                    <div class="password-container">
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                        <button type="button" class="toggle-password" onclick="togglePassword('senha')" aria-label="Mostrar senha">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="senha2">CONFIRME SUA SENHA</label>
                    <div class="password-container">
                        <input type="password" name="senha2" id="senha2" placeholder="Confirme sua senha">
                        <button type="button" class="toggle-password" onclick="togglePassword('senha2')" aria-label="Mostrar senha">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="access-section">
                    <h2 class="section-title">ACESSAR</h2>
                    
                    <div class="form-group">
                        <label>INSPIRA FOTO DE USUÁRIO</label>
                        <div class="photo-upload-container">
                            <div class="photo-preview">
                                <img id="preview-img" src="" alt="Pré-visualização">
                                <div class="placeholder">Sem imagem</div>
                            </div>
                            <div class="file-input-container">
                                <input type="file" name="foto" id="foto" accept="image/*">
                                <label for="foto" class="file-input-label">Selecionar arquivo</label>
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit" value="Acessar" class="submit-btn">
                </div>
            </form>
        </div>
    </div>

    <div class="image-credit">
        FRIV GAMES & WIKI © 2023
    </div>

    <script>
        // Configuração da validação do formulário
        // Validação do formulário
        $(document).ready(function () {
            // Método personalizado para verificar se o e-mail é @gmail.com
            $.validator.addMethod("gmailOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(value);
            }, "O e-mail deve terminar com @gmail.com");

            $('#formulario').validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 3,
                    },
                    gmail: {
                        required: true,
                        minlength: 5,
                        gmailOnly: true // ← regra personalizada aqui
                    },
                    gmail2: {
                        required: true,
                        equalTo: '#gmail',
                    },
                    senha: {
                        minlength: 8,
                        required: true,
                    },
                    senha2: {
                        equalTo: '#senha',
                        required: true,
                    }
                },
                messages: {
                    nome: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Tamanho mínimo de 3 símbolos"
                    },
                    gmail: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Insira um endereço de e-mail válido.",
                        gmailOnly: "O e-mail deve terminar com @gmail.com"
                    },
                    gmail2: {
                        required: "Esse campo não pode ser vazio",
                        equalTo: "Os e-mails não são iguais."
                    },
                    senha: {
                        required: "Esse campo não pode ser vazio",
                        minlength: "Tamanho mínimo de 8 símbolos"
                    },
                    senha2: {
                        equalTo: "As senhas não são iguais.",
                        required: "Esse campo não pode ser vazio"
                    }
                },
                errorPlacement: function(error, element) {
                    error.addClass('error');
                    error.insertAfter(element);
                }
            });
        });

        // Função para mostrar/ocultar senha
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = document.querySelector(`#${fieldId} + .toggle-password i`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
                toggleIcon.setAttribute('aria-label', 'Ocultar senha');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
                toggleIcon.setAttribute('aria-label', 'Mostrar senha');
            }
        }

        // Função para pré-visualizar a imagem selecionada
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewImg = document.getElementById('preview-img');
            const placeholder = document.querySelector('.photo-preview .placeholder');
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                    placeholder.style.display = 'none';
                }
                
                reader.readAsDataURL(file);
            } else {
                previewImg.style.display = 'none';
                placeholder.style.display = 'block';
            }
        });
    </script>
</body>
</html>