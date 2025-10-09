<?php

require_once "../controle/conexao.php";
require_once "../controle/funcoes.php";
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .header .date {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .form-container {
            padding: 25px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
            padding-bottom: 8px;
            border-bottom: 1px solid #eaeaea;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #3498db;
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #7f8c8d;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .access-section {
            margin-top: 30px;
        }

        .access-section .section-title {
            margin-bottom: 15px;
        }

        .photo-upload-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .photo-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #f8f9fa;
            border: 1px dashed #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0; /* Impede que a pré-visualização encolha */
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .photo-preview .placeholder {
            color: #7f8c8d;
            font-size: 0.8rem;
            text-align: center;
            padding: 5px;
        }

        .file-input-container {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .file-input-container input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-label {
            display: block;
            padding: 12px;
            background-color: #f8f9fa;
            border: 1px dashed #ddd;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            color: #7f8c8d;
            transition: background-color 0.3s;
        }

        .file-input-label:hover {
            background-color: #e9ecef;
        }

        /* =========================== */
        /* CÓDIGO DE RESPONSIVIDADE */
        /* =========================== */
        
        /* Tablets (768px para baixo) */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 1.4rem;
            }
            
            .section-title {
                font-size: 1.1rem;
            }
        }
        
        /* Celulares (480px para baixo) */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                max-width: 100%;
                border-radius: 6px;
            }
            
            .header {
                padding: 12px 15px;
            }
            
            .header h1 {
                font-size: 1.3rem;
            }
            
            .form-container {
                padding: 15px;
            }
            
            .section-title {
                font-size: 1rem;
                margin-bottom: 15px;
            }
            
            .form-group {
                margin-bottom: 15px;
            }
            
            .form-group input {
                padding: 10px;
                font-size: 0.95rem;
            }
            
            .photo-upload-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .photo-preview {
                width: 70px;
                height: 70px;
                align-self: center;
            }
            
            .file-input-container {
                width: 100%;
            }
            
            .file-input-label {
                padding: 10px;
                font-size: 0.9rem;
            }
            
            .submit-btn {
                padding: 10px;
                font-size: 0.95rem;
            }
        }
        
        /* Celulares muito pequenos (360px para baixo) */
        @media (max-width: 360px) {
            .header h1 {
                font-size: 1.2rem;
            }
            
            .header .date {
                font-size: 0.8rem;
            }
            
            .form-container {
                padding: 12px;
            }
            
            .form-group input {
                padding: 8px;
            }
            
            .photo-preview {
                width: 60px;
                height: 60px;
            }
            
            .photo-preview .placeholder {
                font-size: 0.7rem;
            }
        }
        
        /* Modo paisagem em celulares */
        @media (max-height: 500px) and (orientation: landscape) {
            body {
                padding: 5px;
                align-items: flex-start;
            }
            
            .container {
                max-width: 100%;
                margin: 10px 0;
            }
            
            .form-container {
                padding: 10px 15px;
            }
            
            .form-group {
                margin-bottom: 10px;
            }
        }
        
        /* Telas grandes (1200px para cima) */
        @media (min-width: 1200px) {
            .container {
                max-width: 450px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FRIV GAMES & WIKI</h1>
            <div class="date">08 DATO DE</div>
        </div>
        
        <div class="form-container">
            <h2 class="section-title">CADASTRO</h2>
            
            <form id="formulario" action="../controle/salvarUsuario.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">NOME DE USUÁRIO</label>
                    <input type="text" name="nome" id="nome">
                </div>
                
                <div class="form-group">
                    <label for="gmail">EMAIL</label>
                    <input type="text" name="gmail" id="gmail">
                </div>
                
                <div class="form-group">
                    <label for="gmail2">CONFIRME SEU E-MAIL</label>
                    <input type="text" name="gmail2" id="gmail2">
                </div>
                
                <div class="form-group">
                    <label for="senha">SENHA</label>
                    <div class="password-container">
                        <input type="password" name="senha" id="senha">
                        <button type="button" class="toggle-password" onclick="togglePassword('senha')" aria-label="Mostrar senha">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="senha2">CONFIRME SUA SENHA</label>
                    <div class="password-container">
                        <input type="password" name="senha2" id="senha2">
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