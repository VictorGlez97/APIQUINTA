<?php 
    var_dump($product); 
    var_dump($colors);
?>

<div class="container-fluid py-4 row justify-content-center">

    <div class="mb-3 border-primary rounded" style="max-width: 100%;">

        <div class="row justify-content-center">
            <div class="col-1 card border border-primary">

            </div> 

            <div class="col-md-4">
                <?php 
                    $img = new \CodeIgniter\Files\File(base_url('root/assets/uploads/' . $product[0]->img)); 
                ?>
                <img src="<?= $img ?>" alt="" class="img-thumbnail border border-primary">
            </div>
            
            <div class="card ml-3 col-md-4 row align-items-center border-primary">
                <div class="card-body text-primary">
                    <h3 class="card-title"> <?= $product[0]->category ?> </h3>
                    <p class="card-text"> <?= $product[0]->description ?> </p>
                    <h4 class="card-text"> $  <?= $product[0]->cost ?> </h4>
                    <hr style="border: 1px dashed;">
                    

                    <h5> Color: </h5>
                    <div class="row mb-3 row justify-content-center">

                        <?php 
                            foreach ($colors as $col) {
                                $img_col = new \CodeIgniter\Files\File(base_url('root/assets/colors/' . $col->img_color));
                        ?>

                                <a href="<?= site_url('/Product/product/'.$col->id) ?>">
                                    <img 
                                        src="<?= $img_col ?>" 
                                        alt="..." 
                                        class="img-thumbnail mr-2 ml-2 <?= $col->id === $product[0]->product_id ? 'bg-primary' : '' ?>"    
                                    >
                                </a>
                        
                        <?php
                            }
                        ?>
                    </div>

                    <h5> Tallas: </h5>
                    <ul class="list-group list-group-horizontal-md mb-3 row justify-content-center">
                        <li class="list-group-item"> ECH </li>  
                        <li class="list-group-item"> CH </li>
                        <li class="list-group-item"> M </li>
                        <li class="list-group-item"> G </li>
                        <li class="list-group-item"> EG </li>
                    </ul>
                    
                    <form action="<?= site_url('/Product/add_cart') ?>" method="post" class="mb-2 row justify-content-center">
                        <input type="number" name="num" id="" class="form-control col-4" value="1">
                        <button class="btn btn-primary ml-2">
                            Añadir al carrito
                        </button>
                        <input type="text" name="id" id="" value="<?= $product[0]->id ?>" hidden>
                    </form>

                    <button class="btn btn-success btn-block mb-2">
                        Pedir
                    </button>

                    

                </div>
            </div>
        </div>
    </div>

    <!--<div class="row container">

        <div class="ml-5">
        </div>

        <div class="text-white ml-5">

            <strong>
                <h1 class="text-primary">  </h1>
            </strong>
            <hr class="bg-primary">

            <h3>  </h3>

            <p> <strong> Categoria: </strong> <?= $product[0]->category ?> </p>
            <p> <strong> Tipo: </strong> <?= $product[0]->type ?> </p>
            <p> <strong> Sexo: </strong> <?= $product[0]->sex ?> </p>

            <h5>  </h5>

        </div>

    </div>-->

</div>
</div>