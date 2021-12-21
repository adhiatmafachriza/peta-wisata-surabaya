<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/50fd19283b.js" crossorigin="anonymous"></script>

    <title>Peta Wisata Surabaya</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('show') }}">Peta Pariwisata Surabaya</a>
        </div>
    </nav>

    <div class="row bg-light">
        <div class="col-md-9">
            <div id="map" style="width: auto; height: 100%;"></div>
        </div>

        <!-- sidebar -->
        <div class="col-md-3">
            <!-- search tempat wisata -->
            <div class="mt-3">
                <h4>Cari</h4>
            </div>
            <form action="{{ route('search') }}" method="post" class="row row-cols-lg-auto">
                @csrf
                <div class="col-9">
                    <input type="text" class="form-control" name="keyword" placeholder="masukkan nama">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <!-- end search tempat wisata -->

            <div class="accordion mt-4" style="margin-right: 20px; margin-bottom: 20px;" id="accordionExample">
                <!-- tambah tempat wisata -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tambah tempat pariwisata
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="{{ route('store') }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label for="name" class="form-label">nama</label>
                                    <input type="text" name="nama" id="name" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="kategori" class="form-label">kategori</label>
                                    <select id="kategori" name="kategori" class="form-control">
                                        <option value="kuliner">kuliner</option>
                                        <option value="religi">religi</option>
                                        <option value="taman">taman</option>
                                        <option value="mall">mall</option>
                                        <option value="museum">museum & monumen</option>
                                        <option value="olahraga">olahraga</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="latitude" class="form-label">latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="longitude" class="form-label">longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <button class="btn btn-primary" type="submit">tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end tempat wisata -->

                <!-- filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Cari berdasarkan kategori
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a type="button" href="/kategori/kuliner" class="btn btn-outline-primary mb-2"><i class="fas fa-utensils"></i> Kuliner</a>
                            <a type="button" href="/kategori/religi" class="btn btn-outline-primary mb-2"><i class="fas fa-mosque"></i> Religi</a>
                            <a type="button" href="/kategori/taman" class="btn btn-outline-primary mb-2"><i class="fas fa-tree"></i> Taman</a>
                            <a type="button" href="/kategori/mall" class="btn btn-outline-primary mb-2"><i class="fas fa-shopping-cart"></i> Mall</a>
                            <a type="button" href="/kategori/museum" class="btn btn-outline-primary mb-2"><i class="fas fa-landmark"></i> Museum & Monumen</a>
                            <a type="button" href="/kategori/olahraga" class="btn btn-outline-primary mb-2"><i class="fas fa-futbol"></i> Olahraga</a>
                        </div>
                    </div>
                </div>
                <!-- end filter -->
            </div>

        </div>
        <!-- end sidebar -->
    </div>

    <!-- footer -->
    <div class="row bg-primary">
        <div class="col-md-12 text-white">
            <div class="col-md-6 px-5 py-4">
                <h5>Kelompok 13</h5>
                <p>Dibuat oleh Fachriza Dian Adhiatma (18051204061), Tony Baskoro (20051204116), Ahmad Ubaidilah Putra (18051204024), Hafidz Jayanegara Guyen (18051204055)</p>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <script>
        let locationLat = -7.244335326914419;
        let locationLong = 112.7375523708469;

        var map = L.map('map').setView([locationLat, locationLong], 12);

        // show map
        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        // show data objek wisata
        <?php foreach($datas as $data): ?>
            L.marker([<?= $data->latitude; ?>, <?= $data->longitude; ?>]).addTo(map).bindPopup("<h6><?= $data->nama ?></h6> <?= $data->alamat; ?>");
        <?php endforeach; ?>
    </script>
</body>
</html>