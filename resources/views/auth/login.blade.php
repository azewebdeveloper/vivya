

<body style="background: url({{asset('images/back.jpg')}});background-repeat:no-repeat;background-size:cover;text-align: center;width: 50px;height: 50px">
<div style="position: absolute;width: 300px;left: 50%;top: 50%; transform: translate(-50%,-50%)" class="account">
    <div class="container">
        <div class="account-top heading">
            <h2>Giriş</h2>
        </div>
        <div class="account-main">
            <div class="col-md-6 account-left">
                <div class="account-bottom">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <input style="width: 300px;border: none;height: 33px;border-radius: 5px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          <div>
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>
                        </div>
                        <div>
                            <input style="width: 300px;border: none;height: 33px;border-radius: 5px;margin-bottom: 10px; margin-top: 10px" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                         <div>
                             @error('password')
                             <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                         </div>
                        </div>
                        <div class="address">
                            <input style="background: #19d219;border: none;color: white;padding: 8px 30px 8px 30px;border-radius: 5px;cursor: pointer;" type="submit" value="Giriş">
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</body>

