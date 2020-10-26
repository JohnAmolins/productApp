

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Product add</h2>
            <form action="<?php echo URL; ?>product/add" method="post" id="addProduct">
                <div class="form-group">
                    <input type="text" name="sku" placeholder="SKU" value="<?php echo $data['sku']?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="price" placeholder="Price"  value="<?php echo $data['price']?>" required>  
                </div>


                <p>Type Switcher </p>
                <select onchange="productType(this);" required>
                    <option value=""></option>
                    <option value="dvd">DVD-disc</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>

                <div id="ifDvd" style="display: none;">
                <div class="form-group">
                <br>
                    <label for="dvd">Size:</label> 
                    <input type="text" id="dvd" name="size" value="<?php echo $data['size']?>"/><br />
                    <p>Please provide size of the DVD disc in Megabits(in MB)</p>
                </div>
                </div>

                <div id="ifBook" style="display: none;">
                <div class="form-group">
                <br>
                    <label for="book">Weight:</label> 
                    <input type="text" id="book" name="weight" value="<?php echo $data['weight']?>"/><br />
                    <p>Please provide Weight (in Kg) for ​​Book</p>
                </div>
                </div>

                <div id="ifFurniture" style="display: none;">
                <br>
                    <label for="furniture">Height:</label> 
                    <input type="text" id="height" name="height" value="<?php echo $data['height']?>"/><br />
                    <label for="furniture">Width:</label> 
                    <input type="text" id="width" name="width" value="<?php echo $data['width']?>"/><br />
                    <label for="furniture">Length:</label> 
                    <input type="text" id="length" name="length" value="<?php echo $data['length']?>"/><br />
                    <p>Please provide dimensions in H x W x L format</p>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Save" class="btn btn-success" onclick="addProduct(this);">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>






<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-success btn-lg" id= "homeButton"><a href="<?php echo URL; ?>product/index">Home</a></button>
</div>