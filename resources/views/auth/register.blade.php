          <!-- Registration Form -->
          <div class="card mb-3">
              <div class="card-body">
                  <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                      <p class="text-center small">Enter your personal details to create an account</p>
                  </div>

                  <form method="post" action="{{ route('register.perform') }}">
                      @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">Your Name</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                      </div>

                      <div class="mb-3">
                          <label for="email" class="form-label">Your Email</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>


                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>

                      <div class="mb-3">
                          <label for="confirmPassword" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                      </div>



                      <div class="text-center">
                          <button type="submit" class="btn btn-primary">Create Account</button>
                      </div>
                  </form>
                 
              </div>
          </div>
          <!-- End of Registration Form -->