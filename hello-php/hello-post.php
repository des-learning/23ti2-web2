<html>
  <body>
  <?php
    $nama = $_POST['nama'] ?? 'World';
    echo "<h1>Hello $nama</h1>";
  ?>
  <form method="POST" action="hello-post.php">
    <div>
      <label>Nama:</label>
      <input type="text" name="nama" />
    </div>
    <div><input type="submit" value="kirim" /></div>
  </form>
  </body>
</html>

