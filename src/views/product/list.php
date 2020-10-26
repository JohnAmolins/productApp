

<div class="d-flex justify-content-center">
    <h1>Product list:</h1>
</div>

<!-- Porduct insert form-->
<form action="<?php echo URL; ?>product/delete" method="post" id="productDeleteForm">  
   <div class="row">
        <?php foreach($data['products'] as $product) : ?>
            <div class="column" id="recordsTable">
                <div class="card">
                    <input type="checkbox" name="check[]" value=<?php echo $product ->id; ?>>

                    <h5 class="card-title"><?php echo $product->sku; ?></h5>
                    <p class="card-text"><?php echo $product->name; ?></p>
                    <p class="card-text"><?php echo $product->price; ?> $</p>
                    
                    <p class="card-text">
                    <?php 
                    if(isset($product->size)){
                        if($product->size != 0){
                        echo 'Size: ';
                        echo $product->size . ' MB';
                        }
                    }
                    ?>

                    <p class="card-text">
                    <?php
                    if($product->height != 0){ 
                    if(isset($product->height, $product->width, $product->length)){
                        echo 'Dimension: ';
                        echo $product->height .' x '. $product->width .' x '. $product->length;
                        }
                    }
                    ?>

                    <p class="card-text">
                    <?php 
                    if(isset($product->weight)){
                        if($product->weight != 0){
                        echo 'Weight: ';
                        echo $product->weight . ' KG';
                        }
                    }
                    ?>
                </div>
                </div>
                
             
        <?php endforeach; ?>
    </div>
    <div class="col">
        <input type="submit" value="delete" id="btn_delete" class="btn btn-danger btn-xs" name="deleteProduct">
        <input type="checkbox" id="checkProduct" onclick="allProducts(this);"> Select All
    </div>

</form>



<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-success btn-lg" ><a href="<?php echo URL; ?>product/index">Home</a></button>
</div>





