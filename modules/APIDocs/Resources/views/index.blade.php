<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>LumenCMS</title>
	  <link rel="stylesheet" type="text/css" href="{{ module_assets('APIDocs', 'css/swagger-ui.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ module_assets('APIDocs', 'css/theme-material.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ module_assets('APIDocs', 'css/sidebar.css') }}" >
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <link rel="icon" type="image/png" href="{{ module_assets('APIDocs', 'img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ module_assets('APIDocs', 'img/favicon-16x16.png') }}" sizes="16x16" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style>

      html
      {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
        height: 100%;
      }

      *,
      *:before,
      *:after
      {
        box-sizing: inherit;
      }

      body
      {
        margin:0;
        background: #fafafa;
        height: 100%;
      }
      


      /*
       *  STYLE 3
       */

      .style-3::-webkit-scrollbar-track
      {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
      }

      .style-3::-webkit-scrollbar
      {
        width: 6px;
        background-color: #F5F5F5;
      }

      .style-3::-webkit-scrollbar-thumb
      {
        background-color: #77c335;
      }

      .sidebar-nav li {
        border-right: 1px solid #eaeaea;
      }

      .sidebar-brand {
        border-right: hidden !important;
      }


    </style>
  </head>

  <body>
    <div id="wrapper">
      <div id="sidebar-wrapper" class="style-3" style="overflow-x: hidden">
        <ul class="sidebar-nav">
          <li class="sidebar-brand" style="border-bottom: 1px solid #fdfbf4;">
            {{-- <a href="#">Lumen CMS</a> --}}
          </li>

          @if(count($menu))
          @foreach($menu as $key => $value)
            <li>
              <a href="#">{{ $key }}</a>
              <ul class="treeview-menu" style="display: block;">
                @foreach($value as $ky => $val)
                <li class=""><a href="#/{{ $val['url'] }}" onclick="directPage('{!! str_replace("/", "-", $val['url']) !!}')">{{ $val['name'] }}</a></li>
                @endforeach
              </ul>
            </li>

          @endforeach

          @endif
         
          <li>
            <a href="javascript:void(0)" onclick="scrollTod('models')">Models</a>
          </li>
          
        </ul>
      </div>

      <div id="page-content-wrapper" style="display: none">
        
          <form style="width: 46%;background-color: #fdfbf4; float: right;display: flex;padding-top: 60px;">

            <input id="_token" type="text" style="width: 80%;
            height: 40px;
            font-family: sans-serif;
            padding-left: 7px;
            margin: 8px;
            border: 2px solid #DADFE1;
            border-radius: 4px 0 0 4px;
            outline: none;" placeholder="Access Token">

            <button type="button" style="font-size: 16px;
            height: 40px;
            margin: 8px;
            margin-left: -8px;
            cursor:pointer;
            font-weight: 700;
            padding: 4px 30px;
            border: none;
            border-radius: 0 4px 4px 0;
            background: #222222;
            font-family: sans-serif;
            color: #fff;" onclick="setToken()">Set</button>

          </form>
          <div id="swagger-ui"></div>
        
      </div>

    </div>

	<script src="{{ module_assets('APIDocs', 'js/swagger-ui-bundle.js') }}"> </script>
	<script src="{{ module_assets('APIDocs', 'js/swagger-ui-standalone-preset.js') }}"> </script>

    <script>

      $(document).ready(function(){
        var uri = window.location.hash;

        var sub_uri = uri.split('/');
        
        var node = sub_uri[1]+'-'+sub_uri[2];

        var checkExist = setInterval(function() {

          if ($('#operations-'+node).length) {
            var new_position = $('#operations-'+node).find('.nostyle').position();
            setTimeout(function(){ 
              window.scrollTo(0,new_position.top-150);
            }, 800);
            clearInterval(checkExist);
          }
        }, 100);



      });



    function directPage(id){

      const op = document.getElementById('operations-' + id);
      // console.log(op.classList.contains('is-open'))
      // if (op.classList.contains('is-open')) {
      //     return window.location.reload(true);
      // } else {

      //   $("#page-content-wrapper").hide();
      //   op.querySelector('div').click(); // Open the main div
      
        var name_ = 'checkExist_'+id;
        var name_ = setInterval(function() {
          if (op.querySelector('.try-out__btn')) { 
           op.querySelector('.try-out__btn').click();
            clearInterval(name_);
          }
        }, 100);

        setTimeout(function(){ 
          $("#page-content-wrapper").show(); 
        }, 500);

       
      // }
      setTimeout(function(){ 
        return window.location.reload(true);
      }, 500);
    }

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    var key = localStorage.getItem("authKey");
    document.getElementById('_token').value = key;

    function setToken(){
      var token = document.getElementById('_token').value;
      localStorage.setItem('authKey', token);
      alert("Authorization has been ADDED. \nJWT Token : "+token)

      return window.location.reload(true);

    }

    window.onload = function() {
      
      // Begin Swagger UI call region
      const ui = SwaggerUIBundle({
        url: '{!! $json !!}',
        dom_id: '#swagger-ui',
        deepLinking: true,
        docExpansion: 'list',
        requestInterceptor: function (req) {
            

            if (key && key.trim() !== "") {
                req.headers.Authorization = 'Bearer ' + key;
                console.log('Authorized using JWT Token');
            }

            return req;
            
        },
        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],
        plugins: [
          SwaggerUIBundle.plugins.DownloadUrl
        ],
        layout: "StandaloneLayout",
        
      })
      // End Swagger UI call region

      window.ui = ui

      $(".download-url-wrapper").remove();
      
      $('.topbar-wrapper a:first-child img').attr('src','{{ module_assets('APIDocs', 'img/favicon-32x32.png') }}');
      $('.topbar-wrapper a:first-child').append('<span id="menu-toggle" style="font-size:16px"></span>')
      $('.topbar-wrapper a:first-child span').html('API Documentation - Developer');
      $('.topbar-wrapper').attr('style', 'left: 0;margin-left: -100px;');
      

      var checkExist = setInterval(function() {
        if ($('.information-container').length) { 
          $(".auth-wrapper").remove();
          $(".information-container").remove();
          $("#page-content-wrapper").show();
          clearInterval(checkExist);
        }
      }, 100);
      
    }


  </script>
  </body>
</html>
