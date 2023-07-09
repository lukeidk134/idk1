<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6366176406490195"
     crossorigin="anonymous"></script>
<?=template_header('Home')?>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6366176406490195"
     data-adtest="on"
     data-ad-slot="4257620531"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
            <?php if ($product['quantity'] > 10): ?>
                <span class="instock"><?="In Stock"?></span>
                <?php endif; ?>
            <?php if ($product['quantity'] < 10): ?>
                <span class="instock"><?=$product['quantity']?></span>
                <?php endif; ?>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>