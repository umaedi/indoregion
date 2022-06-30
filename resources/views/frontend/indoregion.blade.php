<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Offcanvas template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/offcanvas.css') }}" rel="stylesheet">
  </head>

  <body class="bg-light">
    <main role="main" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
                    <div class="lh-100">
                      <h6 class="mb-0 text-white  text-center">Indoregion X Laravel</h6>
                    </div>
                  </div>
            
                  <div class="my-3 p-3 bg-white rounded box-shadow">
                    <div class="form-group">
                        <h6 class="border-gray pb-2 mb-0">Pilih Alamat</h6>
                        <select name="provinsi" class="form-control" id="provinsi">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kabupaten" class="form-control" id="kabupaten">
                            <option>Pilih Kabupaten</option>
                          <div id="kabupaten"></div>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="kecamatan">
                          <option>Pilih Kecamatan</option>
                        </select>
                    </div>
                    <small class="d-block text-right mt-3">
                      <a href="https://github.com/azishapidin/indoregion">Indoregion</a>
                    </small>
                  </div>
        </div>
    </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script>
       async function getProvinsi() {
            $.ajax({
                url: '{{ route('api.getProvincies') }}',
                method: 'GET',
                processData: false,
                contentType: false,
                cache: false,
                complete: (response) => {
                    if(response.status == 200) {
                        let data = response.responseJSON.provinsi;
                        let append = '';
                        $.each(data, (k, v) => {
                            append += '<option value='+ v.id +'>' + v.name + '</option>'
                        });
                        $('select[name=provinsi]').html(append);
                    }
                }
            });
        }
        getProvinsi();

        $("#provinsi").change(() => {
            let id_provinsi = $("#provinsi").val();

            $.ajax({
                url: '/api/getRegencies/'+id_provinsi,
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                complete: (response) => {
                    if (response.status == 200) {
                        let data = response.responseJSON.kabupaten;
                        let append = '';
                        $.each(data, (k, v) => {
                            append +='<option value=' + v.id + '>' + v.name + '</option>';
                            $('select[name=kabupaten]').html(append);
                        });
                    }
                }
            });
        });
        
        $("#kabupaten").change(() => {
            let id_kabupaten = $("#kabupaten").val();
            
            $.ajax({
                url: '/api/getDistrict/'+id_kabupaten,
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                complete: (response) => {
                    if(response.status == 200) {
                        let data = response.responseJSON.kecamatan;
                        let append = '';
                        $.each(data, (k, v) => {
                            append += '<option value=' + v.id + '>' + v.name + '</option>';
                            $("#kecamatan").html(append);
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>
