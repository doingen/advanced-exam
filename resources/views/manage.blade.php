<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/manage.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <title>管理システム</title>
</head>
<style>
  .wrapper {
  margin: 20px auto;
  width: 80%;
}
.title {
  text-align: center;
}
.title-text{
  font-size: 2em;
}
.searchBox{
  margin-bottom: 30px;
  padding: 20px 40px;
  border: solid 2px black;
  border-radius: 5px;
}
.search_row{
  margin: 16px 0;
  display: flex;
}
.search_label{
  padding-right: 20px;
  font-size: 18px;
  font-weight: bold;
}
.search_input{
  width: 200px;
}
.search_gender{
  padding-left: 60px;
}

.search-bottom{
  text-align: center;
}
.search-button{
  width: 10%;
  background-color: black;
  border-radius: 5px;
  font-size: 18px;
  color: white;
}
.reset-button{
  border: none;
  background-color: none;
  background-image: none;
}
table{
  border-collapse: collapse;
}
th{
  text-align: left;
  width: 12%;
  border-bottom: 1px solid black  
}
th:nth-child(3){
  width: 6%;
}
th:nth-child(5){
  width: 50%;
}
.id-column{
  width: 4%;
}
td{
  height: 1.6em;
}
.delete-button{
  background-color: black;
  border-radius: 5px;
  font-size: 12px;
  color: white;
}

/* 実装できてないページネーション */
.pagination {
  display: flex;
  justify-content: space-between;
}
.total-page {
  display: flex;
  align-items: center;
}
</style>
<body>
  <div class="wrapper">
    <div class="title">
      <h1 class="title_text">管理システム</h1>
    </div>
    <div class="searchBox">
      <form action="{{ route('contact.show') }}" method="get">
      @csrf
        <div class="search_row">
          <div class="search_name">
            <label class="search_label">お名前</label>  
            <input type="text" class="search_input" name="name">          
          </div>  
          <div class="search_gender">
            <label class="search_label">性別</label>
            <label for="all"><input type="radio" name="gender"  id="all" value="0" checked
            >全て</label>
            <label for="male"><input type="radio" name="gender" id="male" value="1">男性</label>
            <label for="female"><input type="radio" name="gender" id="female" value="2">女性</label>
          </div>
        </div>
        <div class="search_row">
          <div class="search_createdDate">
            <label class="search_label">登録日</label>            
            <input type="date" class="search_input" name="created_at_start">～
            <input type="date" class="search_input" name="created_at_end">
          </div>
        </div>
        <div class="search_row">
          <div class="search_email">
            <label class="search_label">メールアドレス</label>            
            <input type="text" class="search_input"  name="email">
          </div>
        </div>
        <div class="search-bottom">
          <button class="search-button">検索</button><br>
          <input type="reset" class="reset-button">
        </div>
      </form>
    </div>

    <div class="results">
      <table>
        <tr>
          <th class="id-column">ID</th>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>ご意見</th>
        </tr>
        @if(isset($results))
          @foreach($results as $result)
          <tr>
            <td>{{$result->id}}</td>
            <td>{{$result->fullname}}</td>
            @if($result->gender == 1)
              <td>男性</td>
            @else
              <td>女性</td>
            @endif
            <td>{{$result->email}}</td>
            <td><?php echo mb_strimwidth($result->opinion, 0, 50, '…', 'UTF-8' );?></td>
            <td>
              <form action="{{ route('contact.delete', ['id' => $result->id]) }}" method="post" >
                @csrf
                <button class="delete-button" >削除</button>
              </form>
          </td>
          </tr>
          @endforeach
        @endif
      </table>
    </div>
  </div>
</body>
</html>