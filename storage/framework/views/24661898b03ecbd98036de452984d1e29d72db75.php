<?php $__env->startSection('content-top'); ?>
    <?php echo $__env->make('base::partials.botonera', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('base::partials.ubicacion', ['ubicacion' => ['Noticias']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('base::partials.modal-busqueda', [
        'titulo' => 'Buscar Noticias.',
        'columnas' => [
            'id' => '33.3',
    		'Titulo' => '33.3',
    		'Resumen' => '33.3',
        ]
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['id'=>'formulario', 'name'=>'formulario', 'method'=>'POST']); ?>

        <?php echo $Categorias->generate(); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(isset($layouts) ? $layouts : 'base::layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>