<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <title>内容確認</title>
</head>
<style>
table{
  width: 100%;
}

th {
  width: 30%;
  text-align: left;
}

.content-bottom{
  text-align: center;
}
</style>
<body>
  <div class="wrapper">
    <div class="title">
      <h1 class="title_text">内容確認</h1>
    </div>
    <div class="content">
      <table>
        <tr>
          <th>お名前</th>
          <td>{{$form['fullname']}}</td>
        </tr>
        <tr>
          <th>性別</th>
          <td>
            @if($form['gender'] == 1)
              男性
            @else
              女性
            @endif
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>{{$form['email']}}</td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td>{{$form['postcode']}}</td>
        </tr>
        <tr>
          <th>住所</th>
          <td>{{$form['address']}}</td>
        </tr>
        <tr>
          <th>建物名</th>
          <td>{{$form['building_name']}}</td>
        </tr>
        <tr>
          <th>ご意見</th>
          <td>{{$form['opinion']}}</td>
        </tr>
      </table>
    </div>
    <div class="content-bottom">
      <form action="{{route('contact.store', $form)}}" method="post">
        @csrf
        <button class="submit_button">送信</button>
      </form>
      <a href="{{route('contact.index', $form)}}" class="revise_link">修正する</a>
    </div>
  </div>
</body>
</html>