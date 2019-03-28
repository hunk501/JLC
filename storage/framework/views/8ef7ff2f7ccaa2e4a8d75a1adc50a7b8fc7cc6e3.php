<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('category')); ?>">Product Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(ucfirst($pc_name)); ?></li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <a class="btn btn-success" href="<?php echo e(url('product/add') .'/'. $pc_id); ?>">Add New</a> &nbsp;&nbsp;
                        <!-- <button class="btn btn-danger">Remove</button> -->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>                                        
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($records)): ?>
                                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>
                                                <td><?php echo e($record->name); ?></td>
                                                <td><?php echo e($record->stock); ?></td>
                                                <td>
                                                    <?php if($record->status == 1): ?>
                                                    <span class="badge badge-success">Active</span>
                                                    <?php else: ?> 
                                                    <span class="badge badge-danger">Disabled</span>
                                                    <?php endif; ?>
                                                </td>                                                
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>