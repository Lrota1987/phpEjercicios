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
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
        </tr>
        </thead>
        <tbody>
<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <th scope="row"><?php echo e($fila['id']); ?></th>
                <td><?php echo e($fila['firstname']); ?></td>
                <td><?php echo e($fila['surname']); ?></td>
                <td><?php echo e($fila['email']); ?></td>
                <td><?php echo e($fila['typee']); ?></td>    
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script>
        function handleClick()  {
            window.location.href ='/ej_blade/public/index.php';
        }
    </script>
    <button onclick="handleClick()">LIBROS</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vista', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>