<div class="card mb-3">

<div class="card-body">

  <div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account </h5>
    <p class="text-center small">Enter your Email & password to login</p>
    @if(session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif
  </div>

  <form method="post" action="{{ route('login.perform') }}" class="row g-3 needs-validation" novalidate>
    {{ csrf_field() }} <!-- Add CSRF token -->

    <div class="col-12">
      <label for="yourEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      @if ($errors->has('email'))
      <span class="text-danger text-left">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="yourPassword" required>
      @if ($errors->has('password'))
      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @endif
    </div>


    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Login</button>
    </div>
    <div class="col-12">
      <!-- <p class="small mb-0">Don't have an account? <a href="{{ url('/register') }}">Create an account</a></p> -->
    </div>
  </form>
</div>
</div>