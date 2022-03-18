<html>
    <head>
<style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>NAMA TOKO</h2>
            <small>ALAMAT TOKO</small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>Nama Pel</li>
                    <li>Tanggal Terima</li>
                    <li>Tanggal Selesai</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>{{$cetak->nama}}</li>
                    <li>{{$cetak->created_at}}</li>
                    <li>{{$cetak->tgl_ambil}}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Produk</div>
            <div style="text-align: center;">Berat</div>
            <div>Total</div>
        </div>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
        <div style="text-align: left;">{{ $cetak->nama_produk}}</div>
            <div style="text-align: center;">{{$cetak->berat}} Kg</div>
            <div>Rp. {{$cetak->total_harga}},-</div>
        </div>
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Sisa Bayar</li>
                    
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                <li>
                <?php
                          if ($cetak->bayar != 0){
                            echo "Rp.{$cetak->bayar}";
                            }else{
                              echo "LUNAS";
                                  }
                      ?>
                </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Keterangan</div>
            <div>{{$cetak->keterangan}}</div>
            
        </div>
            <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
                </body>
</html>