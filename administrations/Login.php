<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/secondaPagellaProject/styles.css">
</head>
<body class="light-mode">

<!-- Dark/Light Mode Toggle -->
<label class="mode-toggle">
  <input type="checkbox" id="modeSwitch">
  <span class="slider"></span>
  <span class="toggle-label">Dark Mode</span>
</label>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const checkbox = document.getElementById('modeSwitch');
  const labelText = document.querySelector('.toggle-label');
  const saved = localStorage.getItem('darkMode');
  const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

  // Initialize
  const useDark = saved === 'enabled' || (!saved && systemDark);
  document.body.classList.toggle('dark-mode', useDark);
  document.body.classList.toggle('light-mode', !useDark);
  checkbox.checked = useDark;
  labelText.textContent = useDark ? 'Light Mode' : 'Dark Mode';

  // On toggle
  checkbox.addEventListener('change', () => {
    const isDark = checkbox.checked;
    document.body.classList.toggle('dark-mode', isDark);
    document.body.classList.toggle('light-mode', !isDark);
    labelText.textContent = isDark ? 'Light Mode' : 'Dark Mode';
    localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
  });
});
</script>

    <div class="container">
        <h2>Admin Login</h2>
        <form action="serveLogin.php" method="post">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login" class="btn">
        </form>
        
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
        }
        ?>
    </div>
</body>
</html>
