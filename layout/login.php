<!-- Modal content for login -->
<link rel="stylesheet" href="/css/login.css">
<form action="/action/login_action.php" method="post">
<h2>Sign in</h2>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Log In">
</form>
<button onclick="closeModal('login')">x</button>
