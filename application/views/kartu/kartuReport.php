<?php
defined('BASEPATH') OR exit('');

$total_earned = 0;

/**
 * @fileName transReport
 * @author Ameer <amirsanni@gmail.com>
 * @date 06-Apr-2017
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Transaction Report</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>public/images/icon.ico">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->
        <?php if((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>
        <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">

        <?php else: ?>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <?php endif; ?>
        
        <!-- custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
    </head>

    <body>
        <div class="container margin-top-5">
<!--             <div class="row">
                <div class="col-xs-12 text-right hidden-print">
                    <button class="btn btn-primary btn-sm" onclick="window.print()">Print Report</button>
                </div>
            </div> -->
            
   <!--          <div class="row">
                <div class="col-xs-12 text-center">
                    <h4>Data Stock Opname Barang</h4>
                </div>
            </div> -->


            <div class="row">
                <div class="col-xs-12">
                    <h5>Lampiran</h5>
                    <h5>Berita Acara Hasil Opname Fisik Barang Persediaan</h5>
                    <h5>Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $nomor ?></h5>
                    <h5>Hari, Tanggal&nbsp;: <?php echo $tanggal ?></h5>
                    
                </div>
            </div>
            
            <div class="row margin-top-5">
                <div class="col-xs-12 table-responsive">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading text-center">
                            Laporan
                        </div>
                        <?php if($allTransactions): ?>
                        <div class="table table-responsive">
                             <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sn = 1;
                foreach($semuaKategori as $nilai): ?>
                    <tr>
                        <td></td>
                        <td colspan="4">
                        <strong><?= $nilai->kategori ?></strong>
                        </td>
                    </tr>
                    <?php foreach($allTransactions as $get): 
                        if($get->kategori == $nilai->kategori){?>
                        <tr>
                        <td><?= $sn ?>.</td>
                        <td><?=$get->name?></td>
                        <td><?=$get->code?></td>
                        <td><?= $get->satuan?></td>
                        <td><?=$get->quantity?></td>
                        </tr>
                    <?php $sn++; } ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
                        </div>
                        <!-- table div end--->
                        <?php else: ?>
                            <ul><li>Tidak Ada transaksi</li></ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-6">
                    <button class="btn btn-primary btn-sm hidden-print" onclick="window.print()">Cetak Laporan</button>
                </div>
                
                <!--<div class="col-xs-6 text-right">
                    <h4>Total Earned: &#8358;<?=number_format($total_earned, 2)?></h4>
                </div>-->
            </div>
        </div>
        <!--- panel end-->
    </body>
</html>