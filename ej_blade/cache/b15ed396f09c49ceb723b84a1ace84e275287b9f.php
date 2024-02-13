<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Código</th>
            <th scope="col">isbn</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
        </tr>
        </thead>
        <tbody>
<?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <th scope="row"><?php echo e($fila['id']); ?></th>
                <td><?php echo e($fila['isbn']); ?></td>
                <td><?php echo e($fila['title']); ?></td>
                <td><?php echo e($fila['author']); ?></td>
                <td><?php echo e($fila['stock']); ?></td>
                <td><?php echo e($fila['price']); ?></td>      
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script>
        function handleClick()  {
            window.location.href ='/ej_blade/public/clientes.php';
        }
    </script>
    <button onclick="handleClick()">CLIENTES</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vista', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>