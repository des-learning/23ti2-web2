<html>
  <body>
  <?php
    $nama = $_GET['nama'];
    if ($nama) {
      echo "<h1>Hello $nama</h1>";
    } else {
      echo "<h1>Hello World</h1>";
    }
  ?>
  <form method="GET">
    <div>
      <label>Nama:</label>
      <input type="text" name="nama" />
    </div>
    <div><input type="submit" value="kirim" /></div>
  </form>
  </body>
</html>

