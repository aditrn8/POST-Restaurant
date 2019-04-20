<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <!-- <table align="center">
        <tr>
            <th><h2>Restoranku</h2></th>
        </tr>
        <tr>
            <th>=============================</th>
        </tr>
        <tr>
            <td>Daftar Belanja</td>
            <td>Harga</td>
        </tr>
        <?php foreach ($list_orderDetail as $a) {?>
        <tr>
            <td><b><?= $a['nama_masakan']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rp.<?= number_format($a['harga'])?>,- &nbsp;* <?= $a['qty']?> = Rp.<?= number_format($a['harga'] * $a['qty'])?>,-</td>
        </tr>
        <?php }?>
        <tr>
            <td>===================================</td>
        </tr>
        <?php foreach ($trans as $a) {?>
            <tr>
                <td><b> Total Harga = Rp.<?= number_format($a['total_harga'])?>,-</td>
            </tr>
            <tr>
                <td><b> Total Bayar = Rp.<?= number_format($a['total_bayar'])?>,-</td>
            </tr>
            <tr>
                <td><b> Kembalian = Rp.<?= number_format($a['kembalian'])?>,-</td>
            </tr>
        <?php }?>
    </table> -->

    <table border="0" bcellpadding="10" cellspacing="0" align="center">
            <tr>
                <th colspan="5"><h2>Struk Belanja</h2></th>
            </tr>
            <tr>
                <td colspan="4">=======================================</td>  
            </tr>
            <tr>
                
                <th>Daftar Pesanan</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub Total</th>
            </tr>
            <tr>
                <td colspan="4">=======================================</td>  
            </tr>
            <?php foreach ($list_orderDetail as $a) {?>
            <tr>
                <td><?= $a['nama_masakan']?></td>
                <td>Rp.<?= number_format($a['harga']) ?></td>
                <td><?= $a['qty'] ?></td>
                <td>Rp.<?= number_format($a['harga'] * $a['qty'])?>,-</td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="5">=======================================</td>
            </tr>
            <?php foreach ($trans as $a) {?>
            <tr>
                <th colspan="2">Total Harga</th>
                <th colspan="2">Rp.<?= number_format($a['total_harga'])?>,-</th>
            </tr>
            <tr>
                <th colspan="2">Total Bayar</th>
                <th colspan="2">Rp.<?= number_format($a['total_bayar'])?>,-</th>
            </tr>
            <tr>
                <th colspan="2">Kembalian</th>
                <th colspan="2">Rp.<?= number_format($a['kembalian'])?>,-</th>
            </tr>
            <?php } ?>
    </table>
</body>
</html>
<script>
    window.print();
</script>