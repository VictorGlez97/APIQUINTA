<div class="container py-1">
    <h3 class="card-title text-primary"> New Product </h3>
    <div class="card border border-primary">
        <div class="card-body">
            <form action="<?= site_url('Product/save') ?>" method="POST" class="form-group py-2" enctype="multipart/form-data">
                
                <input type="text" name="product" id="" class="form-control border-info mb-3" placeholder="Product">

                <textarea name="desc" id="" cols="30" rows="3" class="form-control border-info mb-3" placeholder="Description"></textarea>

                <select name="category" id="" class="form-control border-info select mb-3">
                    <?php 
                            if ( !empty($categories) ){ 
                                foreach ($categories as $category) {
                    ?>
                                    <option value="<?= $category->id ?>"> <?= $category->category ?> </option>
                    <?php 
                                }
                            } else {
                    ?>
                                <option value="">  </option>
                            <?php  }?>
                </select>
                
                <select name="type" id="" class="form-control border-info select mb-3">
                    <option value="t-shirt"> Camisa </option>
                    <option value="jogger"> Jogger/Pants </option>
                </select>

                <select name="sex" id="" class="form-control border-info select mb-3">
                    <option value="W"> Women </option>
                    <option value="M"> Men </option>
                    <option value="U"> Unisex </option>
                </select>
                
                <input type="number" name="cost" id="" class="form-control border-info mb-3" placeholder="Cost">

                <div class="custom-file mb-3">
                    <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label border-info" for="validatedCustomFile"> Agrega Img Camisa... </label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <input type="text" name="color" id="" class="form-control border-info mb-3" placeholder="Color" required>

                <div class="custom-file mb-4">
                    <input type="file" name="colorimg" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label border-info" for="validatedCustomFile"> Agrega Img Color... </label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-outline-primary">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>