<table>
    <thead>
        <th>#</th>
        <th>Môn học</th>
        <th>Tên Quiz</th>
        <th>Số câu hỏi</th>
        <th>Thời gian</th>
        <th>Thời gian bắt đầu</th>
        <th>Thời gian kết thúc</th>
        <th>Trạng thái</th>
        <th>Đảo câu</th>
        <th>
            <a href="{{BASE_URL . 'bai-quiz/tao-moi'}}">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach ($quizs as $q)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    @php
                        $parentSubject = $q->subject;
                    @endphp
                    @if ($parentSubject != null)
                        {{$parentSubject->name}}
                    @endif
                </td>
                <td>
                    <a href="{{BASE_URL . 'lam-quiz/' . $q->id}}">{{$q->name}}</a>
                </td>
                <td>{{count($q->questions)}}</td>
                <td>{{$q->duration_minutes}}</td>
                <td>{{$q->start_time}}</td>
                <td>{{$q->end_time}}</td>
                <td>{{$q->status == 1 ? "Active" : "Inactive"}}</td>
                <td>{{$q->is_shuffle == 1 ? "Có" : "Không"}}</td>
                <td>
                    <a href="{{BASE_URL . 'bai-quiz/cap-nhat/' . $q->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'bai-quiz/xoa/' . $q->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>