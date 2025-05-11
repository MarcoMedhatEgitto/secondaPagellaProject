<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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

    <h1>Please register in</h1>
    <div class="container">

        <form action="serveRegister.php" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" placeholder="example@dr.kareem.com" name="email" required>
            </div>
            <div>
                <label for="gender">Gender</label> <br>
                <label for="male">male</label>
                <input type="radio" name="gender" id="male" value="male" required>
                <label for="female">female</label>
                <input type="radio" name="gender" id="female" value="female" required>
                <input type="submit" value="submit" name="submit">
            </div>
        </form>
    </div>

</body>
</html>