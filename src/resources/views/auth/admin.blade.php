@extends('layouts.app')

@section('content')
<h2>Admin</h2>

<!-- 検索フォーム -->
<form action="{{ route('admin.search') }}" method="GET">
    <input type="text" name="query" placeholder="名前やメールアドレスを入力してください">
    <select name="gender">
        <option value="">性別</option>
        <option value="all">全て</option>
        <option value="male">男性</option>
        <option value="female">女性</option>
        <option value="other">その他</option>
    </select>
    <select name="inquiry_type">
        <option value="">お問い合わせの種類</option>
        <option value="delivery">商品のお届けについて</option>
        <option value="exchange">商品の交換について</option>
        <option value="trouble">商品トラブル</option>
        <option value="shop">ショップへのお問い合わせ</option>
        <option value="other">その他</option>
    </select>
    <input type="date" name="date">
    <button type="submit">検索</button>
    <button type="reset">リセット</button>
</form>

<!-- 検索結果一覧 -->
@if($inquiries ?? false)
<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th>日付</th>
        <th>詳細</th>
        <th>削除</th>
    </tr>
    @foreach ($inquiries as $inquiry)
    <tr>
        <td>{{ $inquiry->name }}</td>
        <td>{{ $inquiry->gender }}</td>
        <td>{{ $inquiry->email }}</td>
        <td>{{ $inquiry->inquiry_type }}</td>
        <td>{{ $inquiry->created_at }}</td>
        <td><button onclick="showModal({{ $inquiry->id }})">詳細</button></td>
        <td>
            <form action="{{ route('admin.delete', $inquiry->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $inquiries->links() }}
@endif

<!-- CSVエクスポートボタン -->
<form action="{{ route('admin.export') }}" method="POST">
    @csrf
    <button type="submit">CSVエクスポート</button>
</form>

@endsection