@extends('layout.applayout')  
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">upLexis - Entrar</h5>
            <form class="form-signin" action="/auth" method="POST">
              @csrf
              <div class="form-label-group">
                <input type="text" name ="login" id="login" class="form-control" placeholder="Digite seu usuario" required autofocus>
                <label for="login">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                <label for="senha">Senha</label>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Lembrar a senha</label>
              </div>
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>