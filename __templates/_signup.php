<main class="form-signup w-100 m-auto">
    <form method="post" action="signup.php" class="text-center">
        <img
            class="mb-4 d-block mx-auto"
            src="assets/svg/logo.svg"
            alt="Photogram Logo"
            width="72"
            height="50"
        />

        <h1 class="h3 mb-3 fw-normal">Create your account</h1>

        <div class="form-floating">
            <input
                name="username"
                type="text"
                class="form-control"
                id="floatingUsername"
                placeholder="johndoe"
                required
            />
            <label for="floatingUsername">Username</label>
        </div>

        <div class="form-floating">
            <input
                name="phone"
                type="tel"
                class="form-control"
                id="floatingPhone"
                placeholder="+1 234 567 8900"
                required
            />
            <label for="floatingPhone">Phone number</label>
        </div>

        <div class="form-floating">
            <input
                name="email_address"
                type="email"
                class="form-control"
                id="floatingEmail"
                placeholder="name@example.com"
                required
            />
            <label for="floatingEmail">Email address</label>
        </div>

        <div class="form-floating">
            <input
                name="password"
                type="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password"
                required
            />
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2 hvr-pulse-grow mt-2" type="submit">
            Sign up
        </button>

        <p class="mb-3 text-body-secondary">©2026 Photogram. All rights reserved.</p>
    </form>
</main>