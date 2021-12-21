<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/50fd19283b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <!-- search bar -->
            <form action="{{ route('search') }}" class="row" method="post">
                @csrf
                <div class="col">
                    <input type="text" class="form-control" placeholder="cari tempat wisata" name="keyword">
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        <!-- end search bar -->

        <div class="row">
            <!-- map -->
            <div class="col-md-11">
                <div id="map" style="width: auto; height: 500px;"></div>
            </div>
            <!-- end map -->

            <!-- side button -->
            <div class="col-md-1">
                <button class="btn btn-primary btn-lg mb-2" data-bs-toggle="modal" data-bs-target="#inputModal">
                    <i class="fas fa-plus"></i>
                </button>
                <button class="btn btn-primary btn-lg mb-2" data-bs-toggle="modal" data-bs-target="#ruteModal">
                    <i class="fas fa-route"></i>
                </button>
            </div>
            <!-- end side button -->
        </div>
    </div>

    <!-- input modal -->
    <div class="modal fade" id="inputModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data objek wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputLatitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="inputLatitude">
                    </div>
                    <div class="mb-3">
                        <label for="inputLongitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="inputLongitude">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- end input modal -->

    <script>
        let locationLat = -7.236187278441794;
        let locationLong = 112.6346444868783;

        // var map = L.map('map').setView([locationLat, locationLong], 12);
        var map = L.map('map', {doubleClickZoom: false}).locate({setView: true, maxZoom: 16});
        
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
            L.marker([<?= $data->latitude; ?>, <?= $data->longitude; ?>]).addTo(map).bindPopup("<?= $data->nama ?>");
        <?php endforeach; ?>

        // user location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                locationLat = position.coords.latitude;
                locationLong = position.coords.longitude;
                var abc = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map).bindPopup("Lokasi Anda");
            } 
        )}
    </script>
</body>
</html>