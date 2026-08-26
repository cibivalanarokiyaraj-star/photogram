<?php
$username = $_POST['email_address'];
$password = $_POST['password'];

$result = validate_credentials($username, $password);

if ($result) {
    ?>
    <div class="bg-body-tertiary p-5 rounded mt-3"> <h1>Bottom Navbar examp</h1> <p class="lead">This example is a quick exercise to illustrate how the bottom navbar works.</p> <a class="btn btn-lg btn-primary" href="/docs/5.3/components/navbar" role="button">View navbar docs »</a> </div>

<?php
} else { ?>



<main class="form-signin w-100 m-auto">
    <form method = "post" action = "login.php" class="text-center">
        <img
            class="mb-4 d-block mx-auto"
            src="assets/svg/logo.svg"
            alt=""
            width="72"
            height="50"
        />

        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input name="email_address"
                type="email"
                class="form-control"
                id="floatingInput"
                placeholder="name@example.com"
            />
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
            <input name="password"
                type="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password"
            />
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input
                class="form-check-input"
                type="checkbox"
                value="remember-me"
                id="checkDefault"
            />
            <label class="form-check-label" for="checkDefault">
                Remember me
            </label>
        </div>

        <button class="btn btn-primary w-100 py-2 hvr-pulse-grow" type="submit">
            Sign in
        </button>

        <p class="mt-5 mb-3 text-body-secondary ">©2026 Photogram. All rights reserved.</p>
    </form>
</main>

<?php
}
?>
