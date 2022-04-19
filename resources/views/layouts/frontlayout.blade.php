<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <title>OLMS - Registration</title>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
</head>
<body>
    <div class="main-app">
        <header class="main-header">
            <div class="container-fluid text-center">
                <div class="logo d-inline-block">OLMS</div>
            </div>
        </header>
{{-- Header End --}}

@yield('content')

{{-- Footer start --}}

        <footer class="main-footer text-center py-3">&copy;
            <script>document.write(new Date().getFullYear())</script> Department
        </footer>
    </div>
    <script type="text/javascript">
        //code for validating size of image
        $("input[type='file']").on("change", function () {
            var sizefile = Math.round(((this.files[0].size) / 1024) / 1024);
            if (sizefile > 10) {
                prToast("Upload file less than 2MB.", { type: 'danger' });
                this.value = '';
                $(this).val('');
            }
        });
        //code for validating type of image

        $('.checkimagetype').change(function () {
            var ext = this.value.split('.').pop().toLowerCase();
            // alert(ext);
            prToast(ext + ' file Type', { type: 'warning' });
        });

        function priGroup(d){
            if($(d).val() == 1){
                $(d).parents('.form-group').addClass('pri-group');
            }else{
                $(d).parents('.form-group').removeClass('pri-group');
            }
        }
    </script>
  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>