<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content"> <a class="close">x</a>
            <h3>Sign in</h3>
            <form method="post" class="sign_in" action="{{ url('admin/login') }}">
                 {{ csrf_field() }}
                <label for="username"> Email:
                    <input type="email" name="email" id="email" placeholder="Email address" required="required"  value="{{ old('email') }}"/>
                </label>
                <label for="password"> Password:
                    <input type="password" name="password" id="password" placeholder="Enter Password" required="required" /> 
                </label>
                <button type="submit">Sign in</button>
                <div>
                    <div class="oauth-divider"> <span></span> <span>or</span> <span></span> </div>
                    <a href="{{ url('facebook/redirect') }}">
                        <button type="button" class="fb"><img src="/images/bgfb.png" alt="login with facebook"></button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>