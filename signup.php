<form action="process_signup.php" method="POST">
  <input type="text" name="name" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <label>Select Plan:</label><br>
  <input type="radio" name="plan" value="free" checked> Free<br>
  <input type="radio" name="plan" value="premium"> Premium<br>
  <button type="submit">Continue</button>
</form>
