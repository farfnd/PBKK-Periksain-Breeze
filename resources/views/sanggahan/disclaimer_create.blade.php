<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="Periksa.in">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Periksa.in - Buat Sanggahan</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="/connect_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/connect_assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="/connect_assets/css/connect.min.css" rel="stylesheet">
        <link href="/connect_assets/css/admin2.css" rel="stylesheet">
        <link href="/connect_assets/css/dark_theme.css" rel="stylesheet">
        <link href="/connect_assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-container">
                <div class="page-header">
                    @include('includes.page-header', ['name' => 'Anisa Rahmawati', 'status' => 'Verified'])
                </div>
                <div class="horizontal-bar">
                    @include('includes.horizontal-bar')
                </div>
                <div class="page-content">
                    <div class="page-info container">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Akun</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buat Sanggahan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; "><b>Sanggah Laporan</b></h5>
                                    <p class="page-desc" style="text-align:center;">Sanggah laporan seseorang yang berusaha merusak nama baik Anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sanggahan</h5>
                                        <form method="POST" action="{{route('disclaimer.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <p></p>
                                            <p><b>ID Laporan</b></p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="id_laporan" placeholder="ID Laporan" multiple name="id_laporan" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?> {{old('id_laporan')}}">
                                                @if ($errors->has('id_laporan'))
                                                    <span class="text-danger">{{ $errors->first('id_laporan') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>Keterangan</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="sanggahan" rows="5" placeholder="Tuliskan sanggahan anda" name="sanggahan">{{old('sanggahan')}}</textarea>
                                                
                                                @if ($errors->has('sanggahan'))
                                                    <span class="text-danger">{{ $errors->first('sanggahan') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            <div class="form-group">
                                                <label for="file_bukti">Wajib menyertakan foto/tangkapan layar yang dapat mendukung sanggahan Anda.</label>
                                                <p>Foto harus bertipe .jpeg, .png, .jpg, atau .svg, dengan ukuran kurang dari 2 MB.</p>
                                                <input type="file" class="form-control" id="file_bukti" placeholder="File Pendukung" multiple name="file_bukti[]">
                                                @if ($errors->has('file_bukti'))
                                                    <span class="text-danger">{{ $errors->first('file_bukti') }}</span>
                                                @endif
                                                @foreach ($errors->get('file_bukti.*') as $messages)
                                                    <span class="text-danger">File {{$loop->index + 1}}:</span>
                                                    @foreach ($messages as $message)
                                                        <br>
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="footer-text">{{date("Y")}} © Periksa.in</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src="/connect_assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/connect_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/connect_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/connect_assets/js/connect.min.js"></script>
    </body>
</html>