<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <title>お問い合わせ</title>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" 
  charset="UTF-8"></script>
  <script src="{{ asset('/js/contact.js') }}"></script>
</head>
<body>
  <div class="wrapper">
    <div class="title">
      <h1 class="title_text">お問い合わせ</h1>
    </div>
    <div class="form"> 
      <form action="/contact" method="post" id="contactForm">
      @csrf
        <div class="form_item">
          <p class="form_label form_label_name">お名前<span class="required">※</span></p>
          <div class="form_input form_input_name">
            <div class="form_input_lastname">
              <input type="text" class="box lastname" value="{{ old('lastname') }}"  name="lastname" @if(isset($form['lastname'])) value="{{$form['lastname']}}" @endif>
              @error('lastname')
                {{$message}}<br>
              @enderror
              <p class="form_ex">例）山田</p>
            </div>
            <div class="form_input_firstname">
              <input type="text" class="box firstname" name="firstname" value="{{ old('firstname') }}" @if(isset($form['firstname'])) value="{{$form['firstname']}}" @endif>
              @error('firstname')
                {{$message}}<br>
              @enderror
              <p class="form_ex">例）太郎</p>
            </div>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">性別<span class="required">※</span></p>
          <div class="form_input">
            <label><input type="radio" name="gender" value="1" checked
            @if(isset($form['gender']))
              @if(old('gender')=='1')
                checked="checked"
              @endif
            @endif>男性</label>
            <label><input type="radio" name="gender" value="2" 
            @if(isset($form['gender']))
              @if(old('gender')!='1')
                checked="checked"
              @endif
            @endif>女性</label>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">メールアドレス<span class="required">※</span></p>
          <div class="form_input">
            <input type="text" class="box" name="email" value="{{ old('email') }}" @if(isset($form['email'])) value="{{$form['email']}}" @endif>
            @error('email')
              {{$message}}<br>
            @enderror
            <p class="form_ex">例）text@example.com</p>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">郵便番号<span class="required">※</span></p>
          <div class="form_input post_input">
            <p class="postmark">〒</p>
            <div class="form_input_postcode">
              <input type="text" class="box post-box" name="postcode" value="{{ old('postcode') }}" @if(isset($form['postcode'])) value="{{$form['postcode']}} "onKeyUp="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" @endif> 
              @error('postcode')
                {{$message}}<br>
              @enderror
              <p class="form_ex">例）123-4567</p>
            </div>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">住所<span class="required">※</span></p>
          <div class="form_input">
            <input type="text" class="box" name="address" value="{{ old('address') }}" @if(isset($form['address'])) value="{{$form['address']}}" @endif>
            @error('address')
              {{$message}}<br>
            @enderror
            <p class="form_ex">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">建物名</p>
          <div class="form_input">
            @if(@isset($form['building_name']))
              <input type="text" class="box" name="building_name" value="{{ old('building_name') }}" @if(isset($form['building_name'])) value="{{$form['building_name']}}" @endif>
            @else
              <input type="text" class="box" name="building_name">
            @endif
            <p class="form_ex">例）千駄ヶ谷マンション101</p>
          </div>
        </div>
        <div class="form_item">
          <p class="form_label">ご意見<span class="required">※</span></p>
          <div class="form_input">
            <input type="text"  class="box" name="opinion" value="{{ old('opinion') }}" value="{{ old('building_name') }}" @if(isset($form['opinion'])) value="{{$form['opinion']}}" 
              @endif>
            @error('opinion')
                {{$message}}<br>
            @enderror
          </div>
        </div>
        <div class="form_button">
          <button class="confirm_button">確認</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>