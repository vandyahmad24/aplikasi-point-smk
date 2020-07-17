
<table>
    <thead>
        <tr>
            <th colspan="3">Daftar Guru SMK Sekar Bumi Nusantara </th>
        </tr>
    <tr>
        <th>Nama</th>
        <th>NIK</th>
        <th>Alamat</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guru as $key)
        <tr>
            <td>{{ $key->nama }}</td>
            <td>{{ $key->number }}</td>
            <td>{{ $key->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>