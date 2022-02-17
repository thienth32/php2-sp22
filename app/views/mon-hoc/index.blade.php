<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{BASE_URL . 'tao-moi'}}">Tạo mới</a>
        </th>
        <tbody>
            @foreach($monhoc as $mh)
            <tr>
                <td>{{$mh->id}}</td>
                <td>{{$mh->name}}</td>
                <td>
                    <a href="{{BASE_URL . 'mon-hoc/cap-nhat/' . $mh->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'mon-hoc/xoa/' . $mh->id}}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>