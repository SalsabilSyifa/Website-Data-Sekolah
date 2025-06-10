<?php
include_once 'koneksi.php';
$db = new database();
$data = $db->tampil_data_show_siswa();
$no = 1;
$role = $_SESSION['user']['role'];

foreach ($data as $row) {
  echo "<tr>";
  echo "<td>{$no}</td>";
  echo "<td>{$row['nisn']}</td>";
  echo "<td>{$row['nama']}</td>";
  echo "<td>" . ($row['jeniskelamin'] === 'L' ? 'Laki-Laki' : 'Perempuan') . "</td>";
  echo "<td>{$row['namajurusan']}</td>";
  echo "<td>{$row['kelas']}</td>";
  echo "<td>{$row['alamat']}</td>";
  echo "<td>{$row['namaAgama']}</td>";
  echo "<td>{$row['nohp']}</td>";

  if ($role === 'admin') {
echo "<td class='text-center'>
  <div class='d-flex flex-wrap justify-content-center gap-1'>
    <button 
      class='btn btn-sm btn-warning btn-edit'
      data-id='{$row['idsiswa']}'
      data-nisn='{$row['nisn']}'
      data-nama='{$row['nama']}'
      data-jeniskelamin='{$row['jeniskelamin']}'
      data-jurusan='{$row['kodejurusan']}'
      data-kelas='{$row['kelas']}'
      data-alamat='{$row['alamat']}'
      data-idagama='{$row['idAgama']}'
      data-nohp='{$row['nohp']}'
      data-bs-toggle='modal'
      data-bs-target='#editModal'
    > Edit <i class='bi bi-pencil-square'></i>
    </button>

    <a 
      href='proses.php?aksi=hapus&idsiswa={$row['idsiswa']}' 
      onclick='return confirm(\"Yakin ingin hapus?\")' 
      class='btn btn-sm btn-danger d-flex align-items-center gap-1'
    >
      Hapus <i class='bi bi-trash'></i>
    </a>
  </div>
</td>";

  }
  echo "</tr>";
  $no++;
}
