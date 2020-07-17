
<table>
    <thead>
        <tr>
            <th colspan="3">Daftar Guru SMK Sekar Bumi Nusantara </th>
        </tr>
    <tr>
        <th>Nama</th>
        <th>NISN</th>
        <th>Alamat</th>
         <th>Kelas</th>
          <th>Jurusan</th>
           <th>Anggkatan</th>
            <th>Point</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswa as $key)
        <tr>
            <td>{{ $key->nama }}</td>
            <td>{{ $key->number }}</td>
            <td>{{ $key->alamat }}</td>
            <td>{{ $key->kelas }}</td>
            <td>{{ $key->jurusan }}</td>
            <td>{{ $key->anggkatan }}</td>
            <td>{{ $key->point }}</td>
        </tr>
    @endforeach
    </tbody>
</table>