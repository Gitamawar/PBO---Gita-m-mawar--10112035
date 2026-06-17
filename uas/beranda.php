<?php include 'header.php'; ?>

<div style="text-align: center; padding-top: 120px; padding-bottom: 50px;">
    
    <h2 style="font-weight: 400; color: #222d32; margin-bottom: 15px; letter-spacing: 1px;">
        SELAMAT DATANG <strong style="color: #3c8dbc;"><?php echo strtoupper($_SESSION['username']); ?></strong>
    </h2>
    
    <h2 style="font-weight: 400; color: #555; font-size: 24px; letter-spacing: 1px;">
        DI SISTEM INFORMASI STOK GUDANG BARANG
    </h2>
    
    <div style="margin-top: 50px; font-size: 100px; color: #d2d6de; opacity: 0.7;">
        <i class="fa-solid fa-warehouse"></i>
    </div>
    
</div>

<?php include 'footer.php'; ?>