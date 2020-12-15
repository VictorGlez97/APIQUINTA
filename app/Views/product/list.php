    <div class="row justify-content-center py-4">

        <h3 class="text-primary mb-3"> Productos </h3>

        <div class="card col-11">
            <table class="table">
    
                <thead class="text-center">
                    <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> Img </th>
                        <th scope="col"> Product </th>
                        <th scope="col"> Category </th>
                        <th scope="col"> Cost </th>
                        <th scope="col"> Actions </th>
                    </tr>
                </thead>
    
                <tbody class="text-center">
                    <?php 
                            if (isset($products)){
                                $c = 0;
                                foreach ($products as $pro) {
                                    $c = 1 + $c;
                                    $img = new \CodeIgniter\Files\File(base_url('root/assets/uploads/'.$pro->img));
                    ?>
                                
                                    <tr>
                                        <th scope="row"> <?= $c ?> </th>
                                        <td> <img src="<?= $img ?>" alt="" style="height: 100px;"> </td>
                                        <td> <?= $pro->product ?> </td>
                                        <td> <?= $pro->category ?> </td>
                                        <td> <?= '$'.$pro->cost ?> </td>
                                        <td class="row justify-content-center">
                                            <button class="btn btn-primary btn-sm m-2">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm m-2">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
    
                    <?php   
                                }
                            } 
                    ?>
                </tbody>
    
            </table>
        </div>
        <?php //var_dump($products); ?>

    </div>
</div>