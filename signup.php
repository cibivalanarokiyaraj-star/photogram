<?php
include 'libs/load.php';

$error   = null;
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password'], $_POST['email_address'], $_POST['phone'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $email    = trim($_POST['email_address']);
        $phone    = trim($_POST['phone']);

        $result = User::signup($username, $password, $email, $phone);

        if ($result === false) {
            $success = true; // show success modal, then redirect
        } else {
            $error = $result;
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php load_template('_head');?>
  </head>
  <body class="d-flex align-items-center justify-content-center py-4 bg-body-tertiary" style="min-height:100vh;">

    <?php load_template('_signup'); ?>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($success): ?>
    <--show Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
          <div class="modal-body text-center py-5 px-4">
            <div class="mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="12" fill="#198754" opacity=".15"/>
                <path d="M7 12.5l3.5 3.5 6-7" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h4 class="fw-bold mb-2">Sign up successful!</h4>
            <p class="text-body-secondary mb-4">Your account has been created. Redirecting you to login…</p>
            <div class="progress" style="height:4px;">
              <div id="redirectBar" class="progress-bar bg-success" role="progressbar" style="width:0%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      (function () {
        var modal = new bootstrap.Modal(document.getElementById('successModal'), { backdrop: 'static', keyboard: false });
        modal.show();
        var bar = document.getElementById('redirectBar');
        var duration = 3000; // ms before redirect
        var start = Date.now();
        var timer = setInterval(function () {
          var elapsed = Date.now() - start;
          var pct = Math.min((elapsed / duration) * 100, 100);
          bar.style.width = pct + '%';
          if (elapsed >= duration) {
            clearInterval(timer);
            window.location.href = 'login.php';
          }
        }, 30);
      })();
    </script>

    <?php elseif ($error): ?>
    <--show Error Toast -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x pt-3" style="z-index:9999;">
      <div id="errorToast" class="toast align-items-center text-bg-danger border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body fw-semibold">
            ⚠️ <?php echo htmlspecialchars($error); ?>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </body>
</html>
