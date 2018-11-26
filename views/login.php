<main role="main" class="container my-5">
    <div class = "row align-items-center">
        <div class ="col-12">
            <form class="form-signin" action="/login" method="POST">
                <h1 class="h3 mb-3 font-weight-normal"> Please login </h1>
                <label for="cardNumberInput" class="sr-only"> Card Number </label>
                <input type="text" id="cardNumberInput" name="cardNumber" class="form-control" placeholder="Card Number" required autofocus>
                <label for="passwordInput" class="sr-only">Password</label>
                <input type="password" id="passwordInput" name="password" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit"> Login </button>
            </form>
        </div>
    </div>
</main>