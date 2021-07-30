<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="./estilo.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@300&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <h1>Meus Usuários</h1>
    </header>

    <main>
      <div class="card">
        <form action="autenticar.php" method="GET">
          <legend>Login</legend>

          <div class="grupo">
            <label>Usuário</label>
            <input name="usuario" />
          </div>

          <div class="grupo">
            <label>Senha</label>
            <input name="senha" type="password" />
          </div>

          <button>Entrar</button>
        </form>
      </div>

      <div class="card">
        <form action="criar_conta.php" method="GET">
          <legend>Cadastro</legend>
          <?php
            $mensagemSucesso = $_GET['mensagemSucesso'];
            $mensagemErro = $_GET['mensagemErro'];

            if($mensagemSucesso != null) {
              ?>

              <p id="mensagem-de-retorno" class="sucesso">
                <?php
                
                echo $mensagemSucesso;

                ?>
              </p>

              <?php
            } else if($mensagemErro != null) {
              ?>

              <p id="mensagem-de-retorno" class="erro">
                <?php
                
                echo $mensagemErro;

                ?>
              </p>

              <?php
            }
          ?>

          <div class="grupo">
            <label>Nome</label>
            <input name="nome" />
          </div>

          <div class="grupo">
            <label>Usuário</label>
            <input name="usuario" />
          </div>

          <div class="grupo">
            <label>E-mail</label>
            <input name="email" />
          </div>

          <div class="grupo">
            <label>Senha</label>
            <input name="senha" type="password" />
          </div>

          <button>Cadastrar</button>
        </form>
      </div>
    </main>
  </body>
</html>