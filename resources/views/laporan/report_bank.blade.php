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
        <title>Periksa.in - Laporkan Penipuan</title>

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
                                <li class="breadcrumb-item active" aria-current="page">Laporkan Penipuan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="main-wrapper container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title">
                                    <h5 class="card-title" style="text-align:center; "><b>LAPORKAN PENIPUAN</b></h5>
                                    <p class="page-desc" style="text-align:center;">Laporkan penipuan yang terjadi agar yang lainnya tidak terkena penipuan yang sama.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporkan Nomor Rekening</h5>
                                        <form method="POST" action="{{route('report.store_bank')}}" enctype="multipart/form-data">
                                            @csrf
                                            <p><b>Informasi Rekening</b></p>
                                            <div class="form-group">
                                                <!-- <label for="settings_firstname">Nama Pemilik Rekening</label> -->
                                                <input type="text" class="form-control" id="nama_terlapor" placeholder="Nama Pemilik Rekening" name="nama_terlapor" value="{{old('nama_terlapor')}}">
                                                @if ($errors->has('nama_terlapor'))
                                                    <span class="text-danger">{{ $errors->first('nama_terlapor') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <select class="form-control custom-select" id="bank" name="bank">
                                                        <option selected disabled hidden>Pilih Bank...</option>
                                                        @foreach ($data_bank as $bank)
                                                            <option value="{{ $bank->nama_bank }}" {{ old('bank') == $bank->nama_bank ? "selected" : "" }}>{{ $bank->nama_bank }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('bank'))
                                                        <span class="text-danger">{{ $errors->first('bank') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="nomor_rekening" placeholder="Nomor Rekening" name="nomor_rekening" value="{{old('nomor_rekening')}}">
                                                    @if ($errors->has('nomor_rekening'))
                                                        <span class="text-danger">{{ $errors->first('nomor_rekening') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kontak Pelaku</b></p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <select class="form-control custom-select" id="platform" name="platform">>
                                                        <option selected disabled hidden>Pilih Platform...</option>
                                                        <option value="WhatsApp" {{ old('platform') == "WhatsApp" ? "selected" : "" }}>WhatsApp</option>
                                                        <option value="LINE" {{ old('platform') == "LINE" ? "selected" : "" }}>LINE</option>
                                                        <option value="Facebook" {{ old('platform') == "Facebook" ? "selected" : "" }}>Facebook</option>
                                                        <option value="Instagram" {{ old('platform') == "Instagram" ? "selected" : "" }}>Instagram</option>
                                                        <option value="Twitter" {{ old('platform') == "Twitter" ? "selected" : "" }}>Twitter</option>
                                                        <option value="Lainnya" {{ old('platform') == "Lainnya" ? "selected" : "" }}>Lainnya</option>
                                                    </select>
                                                    @if ($errors->has('platform'))
                                                        <span class="text-danger">{{ $errors->first('platform') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="kontak_pelaku" placeholder="Kontak" name="kontak_pelaku" value="{{old('kontak_pelaku')}}">
                                                    @if ($errors->has('kontak_pelaku'))
                                                        <span class="text-danger">{{ $errors->first('kontak_pelaku') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <p></p>
                                            <p><b>Kronologi</b></p>
                                            <div class="form-group">
                                                <textarea class="form-control" id="kronologi" rows="5" placeholder="Ceritakan konologi selengkap mungkin" name="kronologi">{{old('kronologi')}}</textarea>
                                                @if ($errors->has('kronologi'))
                                                    <span class="text-danger">{{ $errors->first('kronologi') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>Total Kerugian</b></p>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="total_kerugian" placeholder="Rp." multiple name="total_kerugian" value="{{old('total_kerugian')}}">
                                                @if ($errors->has('total_kerugian'))
                                                    <span class="text-danger">{{ $errors->first('total_kerugian') }}</span>
                                                @endif
                                            </div>
                                            <p></p>
                                            <p><b>File-file Pendukung</b></p>
                                            <div class="form-group">
                                                <label for="file_bukti">Wajib menyertakan foto/tangkapan layar yang terkait dengan kronologi kejadian</label>
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
                                            <input type="text" class="form-control" name="tipe_laporan" value="rekening" hidden>
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