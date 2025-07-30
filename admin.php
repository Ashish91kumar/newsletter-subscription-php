<?php
include 'db.php';
$result = $conn->query("SELECT * FROM subscribers ORDER BY created_at DESC");
?>

<h2>All Subscribers</h2>
<table border="1">
  <tr>
    <th>Name</th><th>Email</th><th>Plan</th><th>Subscribed</th><th>Payment ID</th>
  </tr>
<?php while ($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['plan'] ?></td>
    <td><?= $row['subscribed'] ? 'Yes' : 'No' ?></td>
    <td><?= $row['payment_id'] ?></td>
  </tr>
<?php } ?>
</table>
