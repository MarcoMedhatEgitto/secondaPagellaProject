<?php // index.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome | PT Clinic</title>
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
    <h1>Digital PT Clinic</h1>
    <p>Please <strong>Login</strong> or <strong>Register</strong> to continue.</p>
    <div class="actions" style="display:flex; gap:20px; justify-content:center; margin-top:30px;">
      <a href="/secondaPagellaProject/administrations/login.php" class="btn">Login</a>
      <a href="/secondaPagellaProject/administrations/register.php" class="btn">Register</a>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const toggle = document.getElementById('modeToggle');

      // Initialize state
      const saved = localStorage.getItem('darkMode');
      const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

      if (saved === 'enabled' || (!saved && systemPrefersDark)) {
        document.body.classList.add('dark-mode');
        toggle.checked = true;
      } else {
        document.body.classList.add('light-mode');
        toggle.checked = false;
      }

      // On change
      toggle.addEventListener('change', () => {
        if (toggle.checked) {
          document.body.classList.remove('light-mode');
          document.body.classList.add('dark-mode');
          localStorage.setItem('darkMode', 'enabled');
        } else {
          document.body.classList.remove('dark-mode');
          document.body.classList.add('light-mode');
          localStorage.setItem('darkMode', 'disabled');
        }
      });
    });
  </script>
</body>
</html>
