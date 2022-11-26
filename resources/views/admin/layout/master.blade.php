<!DOCTYPE html>
<html>

<head>
  <title>Star Admin Pro Laravel Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('css/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>

<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('admin.layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('admin.layout.footer')
      </div>
    </div>
  </div>

  <!-- base js -->
  {!! Html::script('js/app.js') !!}
  {!! Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  {!! Html::script('assets/js/off-canvas.js') !!}
  {!! Html::script('assets/js/hoverable-collapse.js') !!}
  {!! Html::script('assets/js/misc.js') !!}
  {!! Html::script('assets/js/settings.js') !!}
  {!! Html::script('assets/js/todolist.js') !!}
  <!-- end common js -->

  @stack('custom-scripts')

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea.tinymce-editor',
      height: 400,
      width: 700,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount', 'image'
      ],
      toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
      content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <script>
      $.ajaxSetup({
          headers: {

            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

          }

        });

    console.log('test', $('meta[name="_token"]').attr('content'))
  </script>


  <script>
    $(document).ready(function() {


      $(document).on("click", '.btn-update', function(e) {
        e.preventDefault();

        var name = $(this).parents("tr").find("input[name='edit_name']").val();
        var city = $(this).parents("tr").find("input[name='edit_city']").val();
        var dob = $(this).parents("tr").find("input[name='edit_dob']").val();
        var id = $(this).parents("tr").find("input[name='edit_id']").val();


      
        $.ajax({

          url: "{{ route('employee.update')}}",
          type: "POST",
          data: {
            name: name,
            city:city,
            dob:dob,
            id:id
          },
          success: function(data) {
            alert(data);
          },
          error: function() {
            alert("error!!!!");
          }
        });


      });
    });
  </script>

<script>
    function getUsers() {


      $.ajax({
        url: "{{ route('getEmployee')}}",
        method: "GET",
        success: function(response) {


          var len = 0;
          if (response['data'] != null) {
            len = response['data'].length;
          }

          if (len > 0) {

            for (var i = 0; i < len; i++) {
              var id = response['data'][i].id;
              var name = response['data'][i].name;
              var city = response['data'][i].city;
              var dob = response['data'][i].dob;

              var tr_str = "<tr data-name='" + name + "' data-city='" + city + "' data-dob='" + dob + "' data-id='" + id + "' >" +
                "<td align='center'>" + id + "</td>" +

                "<td align='center'>" + name + "</td>" +
                "<td align='center'>" + city + "</td>" +
                "<td align='center'>" + dob + "</td>" +

                "<td align='center'><span class='btn_edit' > <a href='#' class='btn btn-link' row_id='" + id + "' > Edit</a> </span></td>" +
                "</tr>";

              console.log(tr_str)

              $("#userTable tbody").append(tr_str);

            }
          }
        }

      });

    }

    getUsers();


    $(document).on('click', '.btn_edit', function(event) {

      var name = $(this).parents("tr").attr('data-name');
      var city = $(this).parents("tr").attr('data-city');
      var dob = $(this).parents("tr").attr('data-dob');

      var id = $(this).parents("tr").attr('data-id');

      $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="' + name + '">');
      $(this).parents("tr").find("td:eq(1)").html('<input name="edit_city" value="' + city + '">');
      $(this).parents("tr").find("td:eq(2)").html('<input name="edit_dob" value="' + dob + '">');
      $(this).parents("tr").find("td:eq(3)").html('<input name="edit_id"  type="hidden" value="' + id + '">');

      $(this).parents("tr").find("td:eq(4)").prepend("<button class='btn btn-info btn-xs btn-update'>Save</button>")

      $(this).hide();
    });













    // $(this).parents("tr").find("td:eq(0)").text(name);  
    // $(this).parents("tr").find("td:eq(1)").text(email);  

    // $(this).parents("tr").attr('data-name', name);  
    // $(this).parents("tr").attr('data-email', email);  

    // $(this).parents("tr").find(".btn-edit").show();  
    // $(this).parents("tr").find(".btn-cancel").remove();  
    // $(this).parents("tr").find(".btn-update").remove();  
    //});
  </script>

</body>

</html>